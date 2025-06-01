<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // php artisan db:seed
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // php artisan db:seed, jadi tidak perlu php artisan db:seed CategorySeeder
        $this->call([
            UserSeeder::class,      // Assuming you want to seed users
            CategorySeeder::class,  // Assuming categories are general and should exist first
            GenreSeeder::class,
            CastSeeder::class,
            MovieSeeder::class,     // MovieSeeder depends on Genres and Casts
            RatingSeeder::class,    // RatingSeeder depends on Users and Movies
        ]);
    }
}
