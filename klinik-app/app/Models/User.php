<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function antrianOnline()
    {
        return $this->hasMany(AntrianOnline::class, 'user_id');
    }

    public function schedules()
    {
        return $this->hasMany(Jadwal::class);
    }
    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function artikel()
    {
        return $this->hasMany(Artikel::class);
    }

    public function kategoriArtikel()
    {
        return $this->hasMany(KategoriArtikel::class);
    }

    public function faq()
    {
        return $this->hasMany(FAQ::class);
    }

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }

    public function obat()
    {
        return $this->hasMany(Obat::class);
    }

    public function cutiDokter()
    {
        return $this->hasMany(CutiDokter::class);
    }

    public function pasien()
    {
        return $this->hasMany(Treatment::class);
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class);
    }

}
