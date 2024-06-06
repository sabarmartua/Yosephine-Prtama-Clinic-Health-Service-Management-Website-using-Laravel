<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntrianOnline extends Model
{
    use HasFactory;

    protected $table = 'antrian_online';

    protected $fillable = [
        'user_id',
        'keperluan',
        'tanggal_antrian',
        'nomor_antrian',
        'deskripsi_singkat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
