<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CutiDokter extends Model
{
    use HasFactory;

    protected $table = 'cuti_dokter';

    protected $fillable = [
        'tanggal_mulai',
        'tanggal_berakhir',
        'keterangan',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}