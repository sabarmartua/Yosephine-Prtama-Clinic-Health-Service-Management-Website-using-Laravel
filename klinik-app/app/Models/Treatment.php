<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;

    protected $table = 'treatments';

    protected $fillable = [
        'nama_pasien',
        'usia',
        'alamat',
        'no_hp',
        'keluhan',
        'jenis_pengobatan',
        'tanggal_pengobatan',
        'harga_perawatan',
        'harga_obat',
        'obat',
        'user_id',
    ];

    protected $casts = [
        'obat' => 'array', // Cast kolom obat sebagai array
    ];

    public function obats()
    {
        return $this->belongsToMany(Obat::class, 'treatment_obat', 'treatment_id', 'obat_id')
                    ->withPivot('jumlah_obat')
                    ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
