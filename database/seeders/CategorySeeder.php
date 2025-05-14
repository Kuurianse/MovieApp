<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // php artisan make:seed CategorySeeder
        // php artisan db:seed CategorySeeder

        $categories = [
            'Action',
            'Adventure',
            'Comedy',
            'Drama',
            'Horror',
            'Sci-Fi',
            'Fantasy',
            'Thriller',
            'Romance',
            'Animation',
            'Documentary',
            'Crime',
            'Mystery',
            'Biography',
            'History',
            'War',
            'Western',
            'Musical',
            'Family',
            'Sport',
            'Film-Noir',
            'Short',
            'Superhero',
            'Foreign',
            'Indie'
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'slug' => Str::of($category)->slug('-'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
