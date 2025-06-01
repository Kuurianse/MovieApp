<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    // php artisan make:model Rating -m

    protected $fillable = [
        'user_id',
        'movie_id',
        'rating',
    ];

    // jika ingin mencari rating ini dimiliki oleh siapa dan film apa
    public function user()
    {
        return $this->belongsTo(User::class);
        // model rating dimiliki oleh user class
    }
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
