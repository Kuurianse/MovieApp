<?php

namespace App\Providers;

use App\Views\Composers\MenuComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // ga harus semua di AppServiceProvider, bisa buat file provider baru dengan php artisan make:provider ConfigServiceProvider

                // key, value
        // View::share('menu', [
        //     'Home' => '/',
        //     'Movies' => '/movie',
        //     'About' => '/about',
        //     'Contact' => '/contact'
        // ]);
        // dapat diakses di semua view

        // lebih spesifik, bisa juga pake all *
        // View::composer(['movies.index', 'movies.show'], function ($view){
        //     $view->with('menu', [
        //         'Home' => '/',
        //         'Movies' => '/movie',
        //         'About' => '/about',
        //         'Contact' => '/contact'
        //     ]);
        // });
    
        View::composer('*', MenuComposer::class);
    }
}
