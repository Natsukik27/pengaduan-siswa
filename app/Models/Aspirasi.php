<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'input_aspirasi_id',
        'feedback'
    ];

    protected $casts = [
        'status' => 'string'
    ];

    public function inputaspirasi()
    {
        return $this->belongsTo(InputAspirasi::class, 'input_aspirasi_id');
    }

    // Scope untuk filter status
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Scope untuk pencarian
    public function scopeSearch($query, $search)
    {
        return $query->whereHas('inputaspirasi', function($q) use ($search) {
            $q->where('nis', 'like', "%{$search}%")
              ->orWhere('lokasi', 'like', "%{$search}%")
              ->orWhere('keterangan', 'like', "%{$search}%");
        })->orWhere('feedback', 'like', "%{$search}%");
    }
}