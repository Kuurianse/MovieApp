<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
        // tampilkan semua movie dengan rating
        // $movie = Movie::with('ratings')->get();             // mengambil semua movie beserta rating

        // $movie = Movie::find(2)->ratings()->get();           // mengambil rating dari movie dengan id 2
        // $movie = Movie::find(2)->with('ratings')->get();     // mengambil movie dengan id 2 beserta rating
        // $movie = Movie::find(2)->with('ratings')->first();   // mengambil movie dengan id 2 beserta rating pertama
        // $movie = Movie::find(2)->ratings()->with('user')->get();
        // $movie = Movie::with('ratings.user')->find(2);      // mengambil movie dengan id 2 beserta rating dan user yang memberikan rating

        // Tampilkan semua movie dengan rating di atas 4
        // $movie = Movie::whereHas('ratings', function ($query) {
        //     $query->where('rating', '>', 4);
        // })->get();

        // Tampilkan rata-rata rating dari satu movie
        // $movie = Movie::find(5);
        // $averageRating = $movie->ratings()->avg('rating');
        // return ['movie' => $movie, 'average_rating' => $averageRating];

        // Tampilkan movie dengan rata-rata rating di atas 3
        $movie = Movie::with('ratings')
            ->get()
            ->filter(function ($movie) {
                return $movie->ratings->avg('rating') > 3;
            })
            ->map(function ($movie) {
                return [
                    'title' => $movie->title,
                    'average_rating' => $movie->ratings->avg('rating'),
                ];
            })
            ->values();

        return $movie;
    }
}
