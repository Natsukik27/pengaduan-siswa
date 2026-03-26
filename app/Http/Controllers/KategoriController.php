<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::withCount('inputaspirasi')->orderBy('created_at', 'desc')->get();
        $totalKategori = Kategori::count();
        $kategoriAktif = Kategori::where('status', 1)->count();
        
        return view('pages.kategori.index', compact('kategoris', 'totalKategori', 'kategoriAktif'));
    }

    public function create()
    {
        return view('pages.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'keterangan' => 'required|string|max:50',
            'icon' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'status' => 'boolean'
        ]);

        Kategori::create([
            'keterangan' => $request->keterangan,
            'icon' => $request->icon ?? 'fas fa-folder',
            'deskripsi' => $request->deskripsi,
            'status' => $request->status ?? 1
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Kategori $kategori)
    {
        $kategori->loadCount('inputaspirasi');
        return view('pages.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'keterangan' => 'required|string|max:50',
            'icon' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'status' => 'boolean'
        ]);

        $kategori->update([
            'keterangan' => $request->keterangan,
            'icon' => $request->icon ?? 'fas fa-folder',
            'deskripsi' => $request->deskripsi,
            'status' => $request->status ?? 1
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Kategori $kategori)
    {
        // Cek apakah kategori memiliki pengaduan
        if ($kategori->inputaspirasi_count > 0) {
            return redirect()->route('kategori.index')
                ->with('error', 'Tidak dapat menghapus kategori karena masih memiliki pengaduan terkait.');
        }

        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}