<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Contoh, Share configuration data with all views
        // This is where you can define your configuration data

        $config = [
            'title' => 'Config Service Provider',
            'year' => date('Y'),
            'description' => 'This is a description of the config service provider.',
            'version' => '1.0.0',
            'author' => 'Your Name',
            'theme' => 'default',
            'languages' => [
                'en' => 'English',
                'es' => 'Spanish',
                'fr' => 'French',
            ],
            'features' => [
                'feature1' => 'Feature 1 description',
                'feature2' => 'Feature 2 description',
                'feature3' => 'Feature 3 description',
            ],
            'settings' => [
                'setting1' => 'Setting 1 description',
                'setting2' => 'Setting 2 description',
                'setting3' => 'Setting 3 description',
            ],
            'permissions' => [
                'permission1' => 'Permission 1 description',
                'permission2' => 'Permission 2 description',
                'permission3' => 'Permission 3 description',
            ]
        ];
                    // key, value
        View::share('config', $config);
    }
}
