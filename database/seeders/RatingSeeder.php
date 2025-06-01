<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // php artisan make:seed RatingSeeder
        // php artisan db:seed --class=RatingSeeder

        $movies = DB::table('movies')->pluck('id')->toArray();
        $users = DB::table('users')->pluck('id')->toArray();
        $ratings = [];

        foreach ($movies as $movie) {
            foreach ($users as $user) {
                $ratings[] = [
                    'user_id' => $user,
                    'movie_id' => $movie,
                    'rating' => rand(1, 5),
                    'review' => 'Review for movie ID ' . $movie . ' by user ID ' . $user . ': ' . DB::table('users')->where('id', $user)->value('name'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert the ratings into the database
        // DB::table('ratings')->insert($ratings);
        Rating::insert($ratings);
    }
}
