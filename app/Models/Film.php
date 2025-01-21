<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    // Atribut yang diizinkan untuk mass assignment
    protected $fillable = [
        'title', 'genre', 'rating', 'gambar', 'sinopsis', // tambahkan sinopsis di sini
    ];
    
}
