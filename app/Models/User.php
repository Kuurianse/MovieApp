<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected $with = [
        'profile',
    ];
    // protected $with = ['profile']; // untuk eager loading, selalu return dengan profile ,jika tidak ada di model profile maka akan error

    /*
        nama function bebas, bisa profile, profiles, atau profileUser
        tapi disarankan menggunakan nama yang sesuai dengan relasi
    */
    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }
    public function ratings()
    {
        // satu user dapat memberikan banyak rating untuk berbagai film
        return $this->hasMany(Rating::class, 'user_id', 'id');
    }
}

/*
    hasOne digunakan untuk relasi satu ke satu
    
    belongsTo digunakan untuk relasi satu ke banyak
    belongsToMany digunakan untuk relasi banyak ke banyak
    hasMany digunakan untuk relasi satu ke banyak
    hasManyThrough digunakan untuk relasi satu ke banyak melalui tabel lain
*/