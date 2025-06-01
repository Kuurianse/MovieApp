<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Genre; // Added Genre model

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            'Action', 'Drama', 'Fantasy', 'Supernatural', 'Adventure',
            'Horror', 'Comedy', 'Slice of Life', 'Superhero', 'Mystery',
            'Thriller', 'Sci-Fi'
        ];

        foreach ($genres as $genreName) {
            Genre::updateOrCreate(
                ['slug' => Str::of($genreName)->slug('-')],
                [
                    'name' => $genreName,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
