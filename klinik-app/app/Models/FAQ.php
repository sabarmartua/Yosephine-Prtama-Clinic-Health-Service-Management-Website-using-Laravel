<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;
    protected $table = 'faqs';

    protected $fillable = [
        'pertanyaan',
        'jawaban',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
