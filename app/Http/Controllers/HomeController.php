<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InputAspirasi;
use App\Models\Siswa;
use App\Models\Kategori;
use App\Models\Aspirasi;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Total Pengaduan
        $totalPengaduan = InputAspirasi::count();
        
        // Status Counts
        $menungguCount = InputAspirasi::whereDoesntHave('latestAspirasi')
            ->orWhereHas('latestAspirasi', function($q) {
                $q->where('status', 'Menunggu');
            })->count();
            
        $prosesCount = InputAspirasi::whereHas('latestAspirasi', function($q) {
            $q->where('status', 'Proses');
        })->count();
        
        $selesaiCount = InputAspirasi::whereHas('latestAspirasi', function($q) {
            $q->where('status', 'Selesai');
        })->count();

        // Percentages
        $menungguPercentage = $totalPengaduan > 0 ? round(($menungguCount / $totalPengaduan) * 100, 1) : 0;
        $prosesPercentage = $totalPengaduan > 0 ? round(($prosesCount / $totalPengaduan) * 100, 1) : 0;
        $selesaiPercentage = $totalPengaduan > 0 ? round(($selesaiCount / $totalPengaduan) * 100, 1) : 0;

        // Other Stats
        $totalSiswa = Siswa::count();
        $pengaduanHariIni = InputAspirasi::whereDate('created_at', today())->count();
        
        // Rata-rata response time (dalam hari)
        $rataResponse = $this->calculateAverageResponseTime();
        
        // Tingkat penyelesaian
        $tingkatPenyelesaian = $totalPengaduan > 0 ? round(($selesaiCount / $totalPengaduan) * 100, 1) : 0;

        // Chart Data - 6 bulan terakhir
        $chartData = $this->getChartData();
        $chartLabels = $chartData['labels'];
        $chartValues = $chartData['data'];

        // Kategori Stats
        $kategoriStats = $this->getKategoriStats();
        $kategoriLabels = $kategoriStats->pluck('nama')->toArray();
        $kategoriData = $kategoriStats->pluck('count')->toArray();
        $kategoriColors = $kategoriStats->pluck('color')->toArray();
        $kategoriHoverColors = $kategoriStats->pluck('hover_color')->toArray();

        // Recent Activities
        $recentActivities = $this->getRecentActivities();

        return view('home', compact(
            'totalPengaduan',
            'menungguCount',
            'prosesCount',
            'selesaiCount',
            'menungguPercentage',
            'prosesPercentage',
            'selesaiPercentage',
            'totalSiswa',
            'pengaduanHariIni',
            'rataResponse',
            'tingkatPenyelesaian',
            'chartLabels',
            'chartValues',
            'kategoriStats',
            'kategoriLabels',
            'kategoriData',
            'kategoriColors',
            'kategoriHoverColors',
            'recentActivities'
        ));
    }

    private function calculateAverageResponseTime()
    {
        $aspirasiWithResponse = Aspirasi::whereNotNull('feedback')
            ->where('status', 'Selesai')
            ->get();
            
        if ($aspirasiWithResponse->isEmpty()) {
            return 0;
        }
        
        $totalDays = 0;
        foreach ($aspirasiWithResponse as $aspirasi) {
            $inputDate = $aspirasi->inputAspirasi->created_at;
            $responseDate = $aspirasi->created_at;
            $days = $inputDate->diffInDays($responseDate);
            $totalDays += $days;
        }
        
        return round($totalDays / $aspirasiWithResponse->count(), 1);
    }

    private function getChartData()
    {
        $months = [];
        $data = [];
        
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $monthYear = $date->format('M Y');
            $months[] = $date->format('M');
            
            $count = InputAspirasi::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
                
            $data[] = $count;
        }
        
        return [
            'labels' => $months,
            'data' => $data
        ];
    }

    private function getKategoriStats()
    {
        $kategoris = Kategori::withCount(['inputAspirasis' => function($query) {
            $query->where('created_at', '>=', Carbon::now()->subYear());
        }])->get();
        
        $colors = ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#858796', '#e74a3b'];
        $hoverColors = ['#2e59d9', '#17a673', '#2c9faf', '#dda20a', '#656565', '#be2617'];
        
        return $kategoris->map(function($kategori, $index) use ($colors, $hoverColors) {
            return [
                'nama' => $kategori->keterangan,
                'count' => $kategori->input_aspirasis_count,
                'color' => $colors[$index % count($colors)],
                'hover_color' => $hoverColors[$index % count($hoverColors)]
            ];
        });
    }

    private function getRecentActivities()
    {
        $activities = [];
        
        // Recent pengaduan
        $recentPengaduan = InputAspirasi::with('siswa')->latest()->take(3)->get();
        foreach ($recentPengaduan as $pengaduan) {
            $activities[] = [
                'title' => 'Pengaduan Baru #' . $pengaduan->id,
                'description' => 'Dari: ' . ($pengaduan->siswa->nama ?? 'N/A') . ' - ' . $pengaduan->lokasi,
                'time' => $pengaduan->created_at->diffForHumans()
            ];
        }
        
        // Recent aspirasi updates
        $recentAspirasi = Aspirasi::with('inputAspirasi')->latest()->take(2)->get();
        foreach ($recentAspirasi as $aspirasi) {
            $activities[] = [
                'title' => 'Pengaduan #' . $aspirasi->id_input_aspirasi . ' Diperbarui',
                'description' => 'Status: ' . $aspirasi->status,
                'time' => $aspirasi->created_at->diffForHumans()
            ];
        }
        
        // Sort by time (newest first) and take 5
        usort($activities, function($a, $b) {
            return strtotime($b['time']) - strtotime($a['time']);
        });
        
        return array_slice($activities, 0, 5);
    }
}