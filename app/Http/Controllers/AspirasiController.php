<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\InputAspirasi;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Aspirasi::with('inputaspirasi.kategori', 'inputaspirasi.siswa')
            ->latest();

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->whereHas('inputaspirasi', function($q2) use ($search) {
                    $q2->where('nis', 'like', "%{$search}%")
                       ->orWhere('lokasi', 'like', "%{$search}%")
                       ->orWhere('keterangan', 'like', "%{$search}%");
                })->orWhere('feedback', 'like', "%{$search}%");
            });
        }

        // Filter by date range
        if ($request->has('start_date') && $request->start_date != '') {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->has('end_date') && $request->end_date != '') {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $aspirasis = $query->paginate(10);
        
        return view('pages.aspirasi.index', compact('aspirasis'));
    }

    public function create($input_aspirasi = null)
    {
        // Jika ada parameter, berarti dari input aspirasi detail
        if ($input_aspirasi) {
            $inputaspirasi = InputAspirasi::with(['siswa', 'kategori'])->findOrFail($input_aspirasi);
            return view('pages.aspirasi.create', compact('inputaspirasi'));
        }
        
        // Jika tidak ada parameter, tampilkan form untuk pilih input aspirasi
        $inputaspirasis = InputAspirasi::with(['siswa', 'kategori'])
            ->whereDoesntHave('aspirasi')
            ->orWhereHas('aspirasi', function($query) {
                $query->where('status', '!=', 'Selesai');
            })
            ->latest()
            ->get();
            
        return view('pages.aspirasi.select-input', compact('inputaspirasis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'input_aspirasi_id' => 'required|exists:input_aspirasis,id',
            'status' => 'required|in:Menunggu,Proses,Selesai',
            'feedback' => 'required|string|max:50'
        ]);

        try {
            Aspirasi::create([
                'input_aspirasi_id' => $request->input_aspirasi_id,
                'status' => $request->status,
                'feedback' => $request->feedback,
                
            ]);

            return redirect()->route('inputaspirasi.show', $request->input_aspirasi_id)
                ->with('success', 'Tanggapan berhasil ditambahkan.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function show($id)
    {
        $aspirasi = Aspirasi::with('inputaspirasi')->findOrFail($id);
        return view('pages.aspirasi.show', compact('aspirasi'));
    }

    public function edit($id)
    {
        $aspirasi = Aspirasi::with('inputaspirasi')->findOrFail($id);
        return view('pages.aspirasi.edit', compact('aspirasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Proses,Selesai',
            'feedback' => 'required|string|max:50'
        ]);

        try {
            $aspirasi = Aspirasi::findOrFail($id);
            $aspirasi->update([
                'status' => $request->status,
                'feedback' => $request->feedback
            ]);

            return redirect()->route('aspirasi.index')
                ->with('success', 'Tanggapan berhasil diperbarui.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $aspirasi = Aspirasi::findOrFail($id);
            $aspirasi->delete();

            return redirect()->route('aspirasi.index')
                ->with('success', 'Tanggapan berhasil dihapus.');

        } catch (\Exception $e) {
            return redirect()->route('aspirasi.index')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Export data to PDF
     */
    public function exportPDF(Request $request)
    {
        $query = Aspirasi::with('inputaspirasi.kategori', 'inputaspirasi.siswa')
            ->latest();

        // Apply filters if any
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->whereHas('inputaspirasi', function($q2) use ($search) {
                    $q2->where('nis', 'like', "%{$search}%")
                       ->orWhere('lokasi', 'like', "%{$search}%")
                       ->orWhere('keterangan', 'like', "%{$search}%");
                })->orWhere('feedback', 'like', "%{$search}%");
            });
        }

        $aspirasis = $query->get();

        // You can implement PDF export here using DomPDF or similar
        // For now, just return view
        return view('pages.aspirasi.export', compact('aspirasis'));
    }

    /**
     * Get statistics for dashboard
     */
    public function getStatistics()
    {
        $total = Aspirasi::count();
        $menunggu = Aspirasi::where('status', 'Menunggu')->count();
        $proses = Aspirasi::where('status', 'Proses')->count();
        $selesai = Aspirasi::where('status', 'Selesai')->count();

        return [
            'total' => $total,
            'menunggu' => $menunggu,
            'proses' => $proses,
            'selesai' => $selesai
        ];
    }

    /**
     * Update status only
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Proses,Selesai'
        ]);

        try {
            $aspirasi = Aspirasi::findOrFail($id);
            $aspirasi->update([
                'status' => $request->status
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Status berhasil diperbarui.',
                'status' => $request->status
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}