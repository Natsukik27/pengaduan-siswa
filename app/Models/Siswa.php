<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    // Primary key diganti ke 'nis'
    protected $primaryKey = 'nis';

    // Karena NIS biasanya dimasukkan manual (bukan auto-increment)
    public $incrementing = false;

    // Tipe data primary key (bisa 'string' atau 'int', tergantung database kamu)
    protected $keyType = 'int';

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'nis',
        'kelas',
    ];

    // Relasi ke InputAspirasi (1 siswa bisa punya banyak aspirasi)
    public function inputaspirasi()
    {
        return $this->hasMany(InputAspirasi::class, 'nis', 'nis');
    }
}
