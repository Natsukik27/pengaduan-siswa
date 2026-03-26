<?php

namespace App\Http\Controllers;

use App\Models\InputAspirasi;
use App\Models\Siswa;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InputAspirasiController extends Controller
{
    public function store(Request $request)
    {
        // Validasi yang lebih sederhana dan cepat
        $validatedData = $request->validate([
            'nis' => 'required|numeric|min:1',
            'kategori_id' => 'required|exists:kategoris,id',
            'lokasi' => 'required|string|max:50',
            'keterangan' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Cek NIS terlebih dahulu sebelum proses upload
        if (!Siswa::where('nis', $request->nis)->exists()) {
            return redirect('/#lapor')->with('error', 'NIS belum terdaftar. Harap hubungi Admin.');
        }

        // Handle file upload dengan cara yang lebih efisien
        if ($request->hasFile('foto')) {
            try {
                $foto = $request->file('foto');
                $name = 'aspirasi_' . time() . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();
                $destinationPath = public_path('foto');
                
                // Pastikan folder foto ada
                if (!is_dir($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }
                
                // Gunakan storeAs untuk proses yang lebih cepat
                $foto->move($destinationPath, $name);
                
            } catch (\Exception $e) {
                return redirect('/#lapor')->with('error', 'Gagal mengupload foto: ' . $e->getMessage());
            }
        } else {
            return redirect('/#lapor')->with('error', 'Foto harus diupload.');
        }

        // Simpan data dengan transaction
        try {
            DB::beginTransaction();

            InputAspirasi::create([
                'nis' => $request->nis,
                'kategori_id' => $request->kategori_id,
                'lokasi' => $request->lokasi,
                'keterangan' => $request->keterangan,
                'foto' => $name,
            ]);

            DB::commit();

            return redirect('/#lapor')->with('success', 'Pengaduan berhasil dikirim! Status: Menunggu ditinjau.');

        } catch (\Exception $e) {
            DB::rollBack();
            
            // Hapus file yang sudah diupload jika gagal simpan ke database
            if (isset($name) && file_exists(public_path('foto/' . $name))) {
                unlink(public_path('foto/' . $name));
            }
            
            return redirect('/#lapor')->with('error', 'Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $inputaspirasi = InputAspirasi::with(['siswa', 'kategori', 'aspirasi'])->findOrFail($id);
        return view('pages.inputaspirasi.detail', compact('inputaspirasi'));
    }

    public function index()
    {
        // PERBAIKAN: Gunakan paginate() bukan get() agar bisa menggunakan links()
        $inputaspirasi = InputAspirasi::with(['siswa', 'kategori'])
            ->latest()
            ->paginate(10); // Ganti get() dengan paginate()
            
        return view('pages.inputaspirasi.index', compact('inputaspirasi'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('pages.inputaspirasi.create', compact('kategoris'));
    }

    public function edit($id)
    {
        $inputaspirasi = InputAspirasi::findOrFail($id);
        $kategoris = Kategori::all();
        return view('pages.inputaspirasi.edit', compact('inputaspirasi', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        // Implement update logic
    }

    public function destroy($id)
    {
        try {
            $inputaspirasi = InputAspirasi::findOrFail($id);
            $inputaspirasi->delete();
            
            return redirect()->route('inputaspirasi.index')
                ->with('success', 'Pengaduan berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('inputaspirasi.index')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // Method untuk halaman profil
    public function profil() 
    {
        return view('profil');
    }

    // Method untuk halaman search
public function search() 
{
    $inputaspirasis = InputAspirasi::with([
        'siswa', 
        'kategori', 
        'latestAspirasi' // Menggunakan latestAspirasi untuk mendapatkan status terbaru
    ])->latest()->get();
    
    return view('search', compact('inputaspirasis'));
}
}