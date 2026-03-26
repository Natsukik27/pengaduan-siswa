<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris';

    protected $fillable = [
        'keterangan',
        'icon',
        'deskripsi', 
        'status'
    ];

    // Relasi ke InputAspirasi - PERBAIKAN: gunakan nama yang konsisten
    public function inputAspirasis()
    {
        return $this->hasMany(InputAspirasi::class, 'kategori_id');
    }

    // Alias untuk kompatibilitas - TAMBAHKAN INI
    public function inputaspirasi()
    {
        return $this->hasMany(InputAspirasi::class, 'kategori_id');
    }

    /**
     * Scope untuk kategori aktif
     */
    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }

    /**
     * Accessor untuk status label
     */
    public function getStatusLabelAttribute()
    {
        return $this->status == 'aktif' ? 'Aktif' : 'Nonaktif';
    }

    /**
     * Accessor untuk badge status
     */
    public function getStatusBadgeAttribute()
    {
        $class = $this->status == 'aktif' ? 'badge-success' : 'badge-secondary';
        return '<span class="badge ' . $class . '">' . $this->status_label . '</span>';
    }
}