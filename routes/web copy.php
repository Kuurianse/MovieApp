<?php

// use App\Http\Middleware\CheckMembership; -> udah pake alias
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

$movie = [];

for($i = 0; $i < 10; $i++){
    $movies[] = [
        'title' => 'Movie Title ' . $i+1,
        'description' => 'Description for movie ' . $i+1,
        'year' => 2000 + rand(1, 10),
        'rating' => rand(1, 10),
    ];
};

// misal ingin membuat semua movie hanya bisa diakses admin (isAuth)
Route::group(
    [
        'middleware' => ['isAuth'], 
        'prefix' => 'movie',    // gaperlu '/movie' di route, /movie/{id} => /{id}
        'as' => 'movie.'        // agar bisa diakses dengan route('movie.index')
    ], function() use ($movies){
  

    // /movie
    Route::get('/' , function() use ($movies){
        return $movies;
    });


    // middleware adalah untuk memfilter request yang masuk ke route
    Route::get('/{id}' , function($id) use ($movies){
        return $movies[$id]; 
    })->middleware(['isMember']); //->middleware(isMember::class);
    
    

    // html hanya bisa get atau post saja
    // secara default route post tidak bisa diakses dari browser, yang diakses adalah route get, jadi harus dibantu oleh tools tambahan seperti thunder client atau postman
    Route::post('' , function() use ($movies){
        // post meminta data dari form atau disini movies
    
        $movies[] = [
            'title' => request('title'),
            'description' => request('description'),
            'year' => request('year'),
            'rating' => request('rating'),
        ];
    
        return $movies;
    });
    

    // root parameter
    Route::put('/{id}' , function($id) use ($movies){
        // put adalah untuk mengupdate data yang sudah ada
    
        // index movies ke tiga
        $movies[$id]['title'] = request('title');
        $movies[$id]['description'] = request('description');
        $movies[$id]['year'] = request('year');
        $movies[$id]['rating'] = request('rating');
    
        return $movies;
    });
    

    /* 
        biasanya digunakan untuk mengupdate data
        patch adalah untuk mengupdate data yang sudah ada, tetapi tidak semua data diupdate
        misalnya hanya title dan description saja yang diupdate
        sedangkan year dan rating tidak diupdate
        jadi patch hanya mengupdate data yang diinginkan saja
        sedangkan put mengupdate semua data
        jadi patch lebih ringan dibandingkan put
    */
    Route::patch('/{id}' , function($id) use ($movies){
        $movies[$id]['title'] = request('title');
        $movies[$id]['description'] = request('description');
        $movies[$id]['year'] = request('year');
        $movies[$id]['rating'] = request('rating');
    
        return $movies;
    });
    

    // delete adalah untuk menghapus data yang sudah ada
    Route::delete('/{id}' , function($id) use ($movies){
        unset($movies[$id]);
    /*
        unset adalah untuk menghapus data dari array
        unset tidak menghapus index dari array
        jadi index array tetap ada
    */
        return $movies;
    });
        
});


Route::get('/pricing', function(){
    return 'Please, buy a membership';
});

Route::get('/login', function(){
    return 'Please, login first';
})->name('login'); 