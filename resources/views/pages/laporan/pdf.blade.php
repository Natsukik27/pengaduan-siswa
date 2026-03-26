<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Pengaduan Siswa</title>
    <style>
        @page { margin: 10px; }
        body { 
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 10px;
            line-height: 1.2;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .header { 
            text-align: center;
            margin-bottom: 10px;
            border-bottom: 1px solid #2c5f9e;
            padding-bottom: 5px;
        }
        .header h1 { 
            margin: 0 0 3px 0;
            color: #2c5f9e;
            font-size: 14px;
            font-weight: bold;
        }
        .header p { 
            margin: 1px 0;
            color: #666;
            font-size: 9px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 8px;
            font-size: 8px;
        }
        .table th {
            background-color: #2c5f9e;
            color: white;
            font-weight: bold;
            padding: 4px 2px;
            text-align: left;
            border: 1px solid #1e4a7e;
        }
        .table td {
            padding: 3px 2px;
            border: 1px solid #ddd;
            text-align: left;
            vertical-align: top;
        }
        .table tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        .badge {
            padding: 1px 3px;
            border-radius: 3px;
            font-size: 6px;
            font-weight: bold;
            display: inline-block;
            text-align: center;
        }
        .badge-warning { 
            background-color: #fff3cd; 
            color: #856404;
            border: 1px solid #ffeaa7;
        }
        .badge-primary { 
            background-color: #cce7ff; 
            color: #004085;
            border: 1px solid #b3d7ff;
        }
        .badge-success { 
            background-color: #d4edda; 
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .summary {
            margin-top: 8px;
            padding: 5px;
            background-color: #f8f9fa;
            border-radius: 2px;
            border-left: 2px solid #2c5f9e;
            font-size: 8px;
        }
        .footer {
            margin-top: 10px;
            text-align: center;
            font-size: 7px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 4px;
        }
        .no-data {
            text-align: center;
            padding: 10px;
            color: #666;
            font-style: italic;
        }
        .text-center { text-align: center; }
        .text-muted { color: #999; }
    </style>
</head>
<body>
    <div class="header">
        <h1>LAPORAN PENGADUAN SISWA</h1>
        <p>Sistem Pengaduan dan Aspirasi Siswa</p>
        <p>Periode: 
            @if(request('start_date') && request('end_date'))
                {{ \Carbon\Carbon::parse(request('start_date'))->format('d/m/Y') }} - {{ \Carbon\Carbon::parse(request('end_date'))->format('d/m/Y') }}
            @else
                Semua Data
            @endif
        </p>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th width="20" class="text-center">No</th>
                <th width="55">Tanggal</th>
                <th width="60">NIS</th>
                <th width="70">Kategori</th>
                <th width="80">Lokasi</th>
                <th>Isi Pengaduan</th>
                <th width="50" class="text-center">Status</th>
                <th width="90">Feedback</th>
                <th width="60">Tgl Feedback</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($inputaspirasis as $key => $item)
                @php
                    $latestAspirasi = $item->latestAspirasi;
                @endphp
                <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                    <td><strong>{{ $item->nis }}</strong></td>
                    <td>{{ $item->kategori->keterangan ?? '-' }}</td>
                    <td>{{ $item->lokasi }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td class="text-center">
                        @if (empty($latestAspirasi) || empty($latestAspirasi->status))
                            <span class="badge badge-warning">Menunggu</span>
                        @else
                            <span class="badge 
                                @if($latestAspirasi->status == 'Selesai') badge-success
                                @elseif($latestAspirasi->status == 'Proses') badge-primary
                                @else badge-warning @endif">
                                {{ $latestAspirasi->status }}
                            </span>
                        @endif
                    </td>
                    <td>
                        @if($latestAspirasi && $latestAspirasi->feedback)
                            {{ $latestAspirasi->feedback }}
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        @if($latestAspirasi)
                            {{ $latestAspirasi->created_at->format('d/m/Y') }}
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="no-data">
                        Tidak ada data pengaduan yang dapat ditampilkan
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="summary">
        <strong>Ringkasan Laporan:</strong><br>
        • Total Data: {{ $inputaspirasis->count() }} pengaduan<br>
        • Periode: 
            @if(request('start_date') && request('end_date'))
                {{ \Carbon\Carbon::parse(request('start_date'))->format('d/m/Y') }} - {{ \Carbon\Carbon::parse(request('end_date'))->format('d/m/Y') }}
            @else
                Semua Data
            @endif
        <br>
        • Dicetak pada: {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}
    </div>

    <div class="footer">
        Laporan dihasilkan secara otomatis oleh Sistem Pengaduan Siswa<br>
        Hak Cipta © {{ date('Y') }} - Semua Hak Dilindungi
    </div>
</body>
</html>