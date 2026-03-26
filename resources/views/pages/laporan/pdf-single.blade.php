<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Pengaduan Individual</title>
    <style>
        @page { margin: 20px; }
        body { 
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .header { 
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #2c5f9e;
            padding-bottom: 10px;
        }
        .header h1 { 
            margin: 0 0 5px 0;
            color: #2c5f9e;
            font-size: 18px;
            font-weight: bold;
        }
        .info-section {
            margin-bottom: 20px;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 15px;
        }
        .info-item {
            margin-bottom: 8px;
        }
        .info-label {
            font-weight: bold;
            color: #2c5f9e;
            display: inline-block;
            width: 120px;
        }
        .photo-section {
            text-align: center;
            margin: 20px 0;
        }
        .photo-section img {
            max-width: 100%;
            max-height: 400px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 15px;
            font-weight: bold;
            font-size: 11px;
        }
        .status-menunggu { background-color: #fff3cd; color: #856404; }
        .status-proses { background-color: #cce7ff; color: #004085; }
        .status-selesai { background-color: #d4edda; color: #155724; }
        .feedback-section {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #2c5f9e;
            margin-top: 20px;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>LAPORAN PENGADUAN INDIVIDUAL</h1>
        <p>Sistem Pengaduan dan Aspirasi Siswa</p>
    </div>

    <div class="info-section">
        <div class="info-grid">
            <div>
                <div class="info-item">
                    <span class="info-label">NIS:</span>
                    <strong>{{ $inputaspirasi->nis }}</strong>
                </div>
                <div class="info-item">
                    <span class="info-label">Nama Siswa:</span>
                    {{ $inputaspirasi->siswa->nama ?? '-' }}
                </div>
                <div class="info-item">
                    <span class="info-label">Kelas:</span>
                    {{ $inputaspirasi->siswa->kelas ?? '-' }}
                </div>
            </div>
            <div>
                <div class="info-item">
                    <span class="info-label">Tanggal:</span>
                    {{ $inputaspirasi->created_at->format('d/m/Y H:i') }}
                </div>
                <div class="info-item">
                    <span class="info-label">Kategori:</span>
                    {{ $inputaspirasi->kategori->keterangan ?? '-' }}
                </div>
                <div class="info-item">
                    <span class="info-label">Status:</span>
                    @php
                        $latestAspirasi = $inputaspirasi->latestAspirasi;
                        $status = empty($latestAspirasi) || empty($latestAspirasi->status) ? 'Menunggu' : $latestAspirasi->status;
                        $statusClass = 'status-' . strtolower($status);
                    @endphp
                    <span class="status-badge {{ $statusClass }}">{{ $status }}</span>
                </div>
            </div>
        </div>

        <div class="info-item">
            <span class="info-label">Lokasi:</span>
            {{ $inputaspirasi->lokasi }}
        </div>

        <div class="info-item">
            <span class="info-label">Deskripsi:</span><br>
            <div style="margin-left: 120px; margin-top: 5px;">
                {{ $inputaspirasi->keterangan }}
            </div>
        </div>
    </div>

    @if($inputaspirasi->foto)
    <div class="photo-section">
        <div style="font-weight: bold; margin-bottom: 10px; color: #2c5f9e;">FOTO BUKTI PENGADUAN</div>
        <img src="{{ public_path('foto/' . $inputaspirasi->foto) }}" alt="Foto Pengaduan">
    </div>
    @endif

    @if($latestAspirasi && $latestAspirasi->feedback)
    <div class="feedback-section">
        <div style="font-weight: bold; margin-bottom: 10px; color: #2c5f9e;">FEEDBACK DAN TINDAK LANJUT</div>
        <div><strong>Tanggal Feedback:</strong> {{ $latestAspirasi->created_at->format('d/m/Y H:i') }}</div>
        <div style="margin-top: 8px;"><strong>Keterangan:</strong><br>{{ $latestAspirasi->feedback }}</div>
    </div>
    @endif

    <div class="footer">
        Laporan dihasilkan secara otomatis oleh Sistem Pengaduan Siswa<br>
        Dicetak pada: {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}<br>
        Hak Cipta © {{ date('Y') }} - Semua Hak Dilindungi
    </div>
</body>
</html>