<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

// implements HasMiddleware adalah interface yang ada di Controller, agar bisa menggunakan middleware
class MovieController extends Controller implements HasMiddleware
{
    // constructor, akan dijalankan saat class ini (MovieController) diinstansiasi
    public function __construct()
    {
        // for($i = 0; $i < 10; $i++){
        //     $this->movies[] = [
        //         'title' => 'Movie Title from Controller ' . ($i + 1),
        //         'description' => 'Description for movie ' . ($i + 1),
        //         'year' => 2000 + rand(1, 10),
        //         'rating' => rand(1, 10),
        //     ];
        // }
    }

    public static function middleware(){
        // return [
        //     'isAuth',
        //     new Middleware('isMember', only: ['show']),
        //     // new Middleware('isMember', except: ['show']),
        //     // Mengaktifkan middleware isMember hanya pada method show, 'except' kecuali method show
        // ];
    }

    public function index(){
        // Fetch movies from the database with their genres and cast members
        // $movies = Movie::with(['genres', 'castMembers', 'categories', 'ratings'])->latest()->paginate(10); // Added pagination
        $movies = Movie::with(['genres', 'castMembers', 'categories', 'ratings'])->latest()->get(); // Added pagination
        
        // dd($movies); // Dump and die to display the movies - commented out for view rendering

        return view('welcome', compact('movies'))->with([
            'pageTitle' => 'List of Movies'
        ]);
    }

    // parameter id secara otomatis akan diisi dengan id yang ada di url, dan ga harus $id, begitupun pada route
    public function show(string $slug){ // Changed parameter to $slug
        // Fetch a single movie by its slug with its relationships
        $movie = Movie::with(['genres', 'castMembers', 'categories', 'ratings'])->where('slug', $slug)->firstOrFail();
        return view('movies.show', ['movie' => $movie, 'movieId' => $movie->id]); // Pass movie->id as movieId
    }

    public function create(){
        // You might want to pass categories, genres, casts to the view for selection
        $categories = Category::all();
        $genres = \App\Models\Genre::all();
        $casts = \App\Models\Cast::all();
        return view('movies.create', compact('categories', 'genres', 'casts')); // Assuming movies.create exists
    }

    public function store(StoreMovieRequest $request){
        $validatedData = $request->validated();

        $movie = Movie::create([
            'title' => $validatedData['title'],
            'title_japanese' => $validatedData['title_japanese'] ?? null,
            'slug' => \Illuminate\Support\Str::slug($validatedData['title']),
            'description' => $validatedData['description'],
            'description_id' => $validatedData['description_id'] ?? null,
            'release_date' => $validatedData['release_date'],
            // 'image' => $validatedData['image'], // Handle image upload properly in a real app
        ]);

        // Handle image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $path = $request->file('image')->store('public/movie_images');
            $movie->image = \Illuminate\Support\Facades\Storage::url($path);
            $movie->save();
        } elseif (!empty($validatedData['image_url'])) { // Fallback for URL
            $movie->image = $validatedData['image_url'];
            $movie->save();
        }


        // Attach categories, genres, cast if provided
        if ($request->has('categories') && is_array($request->input('categories'))) {
            $movie->categories()->sync($request->input('categories'));
        }
        
        if ($request->has('genres') && is_array($request->input('genres'))) {
             $movie->genres()->sync($request->input('genres'));
        }

        if ($request->filled('cast_text')) {
            $castNames = array_map('trim', explode(',', $request->input('cast_text')));
            $castIds = [];
            foreach ($castNames as $castName) {
                if (!empty($castName)) { // Ensure not to process empty strings
                    $cast = \App\Models\Cast::updateOrCreate(
                        ['name' => $castName],
                        ['slug' => \Illuminate\Support\Str::slug($castName)]
                    );
                    $castIds[] = $cast->id;
                }
            }
            $movie->castMembers()->sync($castIds);
        } else {
            // If you want to remove all cast members when the field is empty on store
            // $movie->castMembers()->detach(); // Usually not needed for store, but depends on desired behavior
        }


        return redirect()->route('movie.index')->with('success', 'Movie created successfully!');
    }

    public function edit($id){
        $movie = Movie::with(['categories', 'genres', 'castMembers'])->findOrFail($id);
        $categories = Category::all();
        $genres = \App\Models\Genre::all();
        $casts = \App\Models\Cast::all();
        
        return view('movies.edit', compact('movie', 'categories', 'genres', 'casts')); // Assuming movies.edit exists
    }

    public function update(StoreMovieRequest $request, $id){
        $movie = Movie::findOrFail($id);
        $validatedData = $request->validated();

        $movie->update([
            'title' => $validatedData['title'],
            'title_japanese' => $validatedData['title_japanese'] ?? null,
            'slug' => \Illuminate\Support\Str::slug($validatedData['title']), // Optionally update slug
            'description' => $validatedData['description'],
            'description_id' => $validatedData['description_id'] ?? null,
            'release_date' => $validatedData['release_date'],
        ]);
       
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Delete old image if exists
            if ($movie->image) {
                $oldImagePath = str_replace('/storage', 'public', $movie->image);
                \Illuminate\Support\Facades\Storage::delete($oldImagePath);
            }
            $path = $request->file('image')->store('public/movie_images');
            $movie->image = \Illuminate\Support\Facades\Storage::url($path);
            $movie->save();
        } elseif (!empty($validatedData['image_url']) && $validatedData['image_url'] !== $movie->image) {
             // Delete old image if a new URL is provided and it's different
            if ($movie->image && strpos($movie->image, '/storage/') === 0) { // Basic check if it's a stored file
                $oldImagePath = str_replace('/storage', 'public', $movie->image);
                \Illuminate\Support\Facades\Storage::delete($oldImagePath);
            }
            $movie->image = $validatedData['image_url'];
            $movie->save();
        }


        if ($request->has('categories') && is_array($request->input('categories'))) {
            $movie->categories()->sync($request->input('categories'));
        } else {
            $movie->categories()->detach();
        }
        
        if ($request->has('genres') && is_array($request->input('genres'))) {
             $movie->genres()->sync($request->input('genres'));
        } else {
            $movie->genres()->detach();
        }

        if ($request->filled('cast_text')) {
            $castNames = array_map('trim', explode(',', $request->input('cast_text')));
            $castIds = [];
            foreach ($castNames as $castName) {
                 if (!empty($castName)) {
                    $cast = \App\Models\Cast::updateOrCreate(
                        ['name' => $castName],
                        ['slug' => \Illuminate\Support\Str::slug($castName)]
                    );
                    $castIds[] = $cast->id;
                }
            }
            $movie->castMembers()->sync($castIds);
        } else {
            $movie->castMembers()->detach(); // Remove all cast members if field is empty
        }


        return redirect()->route('movie.show', $movie->slug)->with('success', 'Movie updated successfully!');
    }

    public function destroy($id){
        $movie = Movie::findOrFail($id);
        // Delete image file if it exists
        if ($movie->image && strpos($movie->image, '/storage/') === 0) {
             $imagePath = str_replace('/storage', 'public', $movie->image);
            \Illuminate\Support\Facades\Storage::delete($imagePath);
        }
        $movie->delete();

        return redirect()->route('movie.index')->with('success', 'Movie deleted successfully!');
    }

    // attachCategory adalah method untuk menghubungkan movie dengan category
    public function attachCategory(){
        
        // menambahkan category dengan id 25 dan 27 ke movie dengan id 2
        // $movie = Movie::find(2);
        // $movie->categories()->attach([25, 27]);
        // return Movie::with('categories')->find(2);

        // menambahkan movie dengan id 2 dan 3 ke category dengan id 25
        // $category = Category::find(25);
        // $category->movies()->attach([2, 3]);
        // return Category::with('movies')->find(25);       // menampilkan category dengan id 25 beserta movie yang terhubung

        // Tampilkan seluruh movie yang ada category-nya beserta kategorinya
        $moviesWithCategories = Movie::with('categories')->has('categories')->get();
        return $moviesWithCategories;
    }

    public function detachCategory()
    {
        // menghapus category dengan id 25, 26 dari movie dengan id 2
        // $movie = Movie::find(2);
        // $movie->categories()->detach([25, 26]); 
        // return Movie::with('categories')->find(2);

        // menghapus semua category yang terhubung dengan movie 3
        $movie = Movie::find(3);
        $movie->categories()->detach(); // menghapus semua category yang terhubung dengan movie 3
        return Movie::with('categories')->find(3);

        // menghapus movie dengan id 2 dan 3 dari category dengan id 25
        // $category = Category::find(25);
        // $category->movies()->detach([2, 3]);
        // return Category::with('movies')->find(25);       // menampilkan category dengan id 25 beserta movie yang terhubung
    }

    public function syncCategory()
    {
        $movie = Movie::find(1);
        $movie->categories()->sync([1,4]); 
        // menghapus semua category yang terhubung dengan movie ?, dan menambahkan category dengan id ?, ?
        
        // Menghapus semua film yang sebelumnya terhubung dengan kategori tersebut di tabel pivot. 
        // Menambahkan film dengan ID 1 ke kategori tersebut.
        // $category = Category::find(3);
        // $category->movies()->sync([1]); 
        
        return Movie::with('categories')->find(1);
        /*
            Metode sync() mengganti semua data yang ada di tabel pivot untuk relasi ini dengan data baru yang diberikan dalam array [25, 26].
            Dalam hal ini, ID kategori 25 dan 26 akan menjadi satu-satunya kategori yang terkait dengan film tersebut (ID 2). Jika ada kategori lain yang sebelumnya terkait, mereka akan dihapus.

            Ketika Anda memanggil sync() pada movie->categories(), Anda mengganti semua kategori untuk film tersebut.
            Ketika Anda memanggil sync() pada category->movies(), Anda mengganti semua film untuk kategori tersebut, tetapi kategori lain yang terhubung dengan film tersebut tetap ada.
        */
    }
}
