<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'profesi',
        'gambar',
        'nomor_telepon',
        'tanggal_lahir',
        'alamat',
        'pendidikan_terakhir',
        'user_id',
    ];

    protected $dates = [
        'tanggal_lahir',
    ];

    public function schedules()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
