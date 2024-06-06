<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriArtikel extends Model
{
    use HasFactory;

    protected $table = 'kategori_artikel';

    protected $fillable = [
        'nama',
        'user_id',
    ];

    public function artikels()
    {
        return $this->hasMany(Artikel::class, 'kategori_artikel_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
