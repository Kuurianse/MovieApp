<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    // php artisan make:model Movie -m
    use HasFactory; 
    // use HasFactory memungkinkan model Anda untuk menggunakan factory, yang sangat berguna untuk pengujian dan seeding data. Jika Anda tidak menggunakan factory, trait ini tidak diperlukan.

    protected $fillable = [
        'title',
        'title_japanese',
        'slug',
        'description',
        'description_id',
        'release_date',
        'image',
    ];

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'movie_id', 'id');
        // model movie memiliki banyak rating
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_movie', 'movie_id', 'category_id');
        // model movie memiliki banyak kategori
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genre', 'movie_id', 'genre_id');
    }

    public function castMembers()
    {
        return $this->belongsToMany(Cast::class, 'movie_cast', 'movie_id', 'cast_id');
    }
}
