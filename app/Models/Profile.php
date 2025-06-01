<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // php artisan make:model Profile -m, membuat migration dan model sekaligus

    // php artisan make:model Profile -mcr, membuat migration, model, dan controller sekaligus
    // php artisan make:model Profile -mcr --api, membuat migration, model, dan controller sekaligus dengan route api
    // Route API berarti controller yang dihasilkan akan menggunakan resource routes yang disesuaikan untuk API, tanpa metode seperti create/edit yang biasanya digunakan untuk tampilan HTML.

    protected $fillable = [
        'phone',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
        // model profile dimiliki oleh user class
    }
}