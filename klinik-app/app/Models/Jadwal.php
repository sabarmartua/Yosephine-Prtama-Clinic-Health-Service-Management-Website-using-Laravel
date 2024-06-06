<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'pegawai_id',
        'user_id',
        'jadwal',
    ];

    protected $casts = [
        'jadwal' => 'array', // Mengonversi kolom jadwal ke array secara otomatis
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
