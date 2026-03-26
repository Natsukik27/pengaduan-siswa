<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputAspirasi extends Model
{
    use HasFactory;

    protected $table = 'input_aspirasis';

    protected $fillable = [
        'nis',
        'kategori_id', 
        'lokasi',
        'keterangan',
        'foto'
    ];

    // Relasi ke siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }

    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    // Relasi ke aspirasi (one to many)
    public function aspirasis()
    {
        return $this->hasMany(Aspirasi::class, 'input_aspirasi_id');
    }

    // Relasi ke aspirasi terbaru - PERBAIKAN
    public function latestAspirasi()
    {
        return $this->hasOne(Aspirasi::class, 'input_aspirasi_id')->latest();
    }

    // Relasi ke aspirasi pertama (fallback)
    public function aspirasi()
    {
        return $this->hasOne(Aspirasi::class, 'input_aspirasi_id')->oldestOfMany();
    }

    // Accessor untuk mendapatkan status terbaru
    public function getStatusAttribute()
    {
        $latest = $this->latestAspirasi;
        return $latest ? $latest->status : 'Menunggu';
    }

    // Accessor untuk mendapatkan feedback terbaru
    public function getFeedbackAttribute()
    {
        $latest = $this->latestAspirasi;
        return $latest ? $latest->feedback : null;
    }
}