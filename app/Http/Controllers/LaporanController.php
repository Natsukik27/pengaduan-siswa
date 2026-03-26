<?php

namespace App\Http\Controllers;

use App\Models\InputAspirasi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporan(Request $request) 
    {
        $query = InputAspirasi::with([
            'siswa', 
            'kategori', 
            'latestAspirasi'
        ]);

        // Filter by date range
        if ($request->has('start_date') && $request->start_date != '') {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->has('end_date') && $request->end_date != '') {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            if ($request->status == 'Menunggu') {
                $query->where(function($q) {
                    $q->whereDoesntHave('latestAspirasi')
                      ->orWhereHas('latestAspirasi', function($subQ) {
                          $subQ->where('status', 'Menunggu');
                      });
                });
            } else {
                $query->whereHas('latestAspirasi', function($q) use ($request) {
                    $q->where('status', $request->status);
                });
            }
        }

        $inputaspirasis = $query->latest()->paginate(10);

        // Statistics - Hitung berdasarkan data yang difilter
        $totalPengaduan = $inputaspirasis->total();
        $menungguCount = $this->getStatusCount(clone $query, 'Menunggu');
        $prosesCount = $this->getStatusCount(clone $query, 'Proses');
        $selesaiCount = $this->getStatusCount(clone $query, 'Selesai');

        return view('pages.laporan.index', compact(
            'inputaspirasis', 
            'totalPengaduan', 
            'menungguCount', 
            'prosesCount', 
            'selesaiCount'
        ));
    }

    private function getStatusCount($query, $status)
    {
        $cloneQuery = clone $query;
        
        if ($status == 'Menunggu') {
            return $cloneQuery->where(function($q) {
                $q->whereDoesntHave('latestAspirasi')
                  ->orWhereHas('latestAspirasi', function($subQ) {
                      $subQ->where('status', 'Menunggu');
                  });
            })->count();
        } else {
            return $cloneQuery->whereHas('latestAspirasi', function($q) use ($status) {
                $q->where('status', $status);
            })->count();
        }
    }

    public function pdf(Request $request) 
    {
        $query = InputAspirasi::with([
            'siswa', 
            'kategori', 
            'latestAspirasi'
        ]);

        // Apply same filters as laporan page
        if ($request->has('start_date') && $request->start_date != '') {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->has('end_date') && $request->end_date != '') {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        // Filter by status - sama seperti di method laporan
        if ($request->has('status') && $request->status != '') {
            if ($request->status == 'Menunggu') {
                $query->where(function($q) {
                    $q->whereDoesntHave('latestAspirasi')
                      ->orWhereHas('latestAspirasi', function($subQ) {
                          $subQ->where('status', 'Menunggu');
                      });
                });
            } else {
                $query->whereHas('latestAspirasi', function($q) use ($request) {
                    $q->where('status', $request->status);
                });
            }
        }

        $inputaspirasis = $query->latest()->get();
        
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pages.laporan.pdf', compact('inputaspirasis'))
                  ->setPaper('a4', 'portrait')
                  ->setOptions([
                      'defaultFont' => 'sans-serif',
                      'isHtml5ParserEnabled' => true,
                      'isRemoteEnabled' => true,
                      'dpi' => 150,
                      'chroot' => public_path() // Important for images
                  ]);
        
        $filename = 'laporan-pengaduan-siswa-' . date('Y-m-d') . '.pdf';
        
        if ($request->has('download')) {
            return $pdf->download($filename);
        }
        
        return $pdf->stream($filename);
    }

    // Method untuk export PDF per laporan
    public function pdfSingle($id)
    {
        $inputaspirasi = InputAspirasi::with([
            'siswa', 
            'kategori', 
            'latestAspirasi'
        ])->findOrFail($id);

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pages.laporan.pdf-single', compact('inputaspirasi'))
                  ->setPaper('a4', 'portrait')
                  ->setOptions([
                      'defaultFont' => 'sans-serif',
                      'isHtml5ParserEnabled' => true,
                      'isRemoteEnabled' => true,
                      'dpi' => 150,
                      'chroot' => public_path()
                  ]);
        
        $filename = 'laporan-pengaduan-' . $inputaspirasi->nis . '-' . date('Y-m-d') . '.pdf';
        return $pdf->download($filename);
    }
}