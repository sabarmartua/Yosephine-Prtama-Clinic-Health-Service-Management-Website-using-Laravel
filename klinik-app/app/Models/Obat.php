<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obats';

    protected $fillable = [
        'nama',
        'jumlah_stok',
        'deskripsi',
        'tanggal_expired',
        'gambar',
        'user_id',
        'harga',
    ];

    public function treatments()
    {
        return $this->belongsToMany(Treatment::class, 'treatment_obat', 'obat_id', 'treatment_id')
                    ->withPivot('jumlah_obat')
                    ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
