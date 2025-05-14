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
}
