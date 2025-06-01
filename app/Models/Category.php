<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // php artisan make:model Category

    protected $fillable = [
        'name',
        'slug',
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'category_movie', 'category_id', 'movie_id');
        // menggunakan belongsToMany karena hubungan antara kategori dan film adalah many-to-many, yang memerlukan tabel pivot untuk menghubungkan kedua tabel. Jika hubungan tersebut adalah one-to-many, maka Anda akan menggunakan hasMany.
    }
}
