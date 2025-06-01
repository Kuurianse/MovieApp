<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // php artisan make:seed UserSeeder
        // php artisan db:seed --class=UserSeeder

        DB::table('users')->insert([
            [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'Jane Smith',
            'email' => 'janesmith@example.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'Udin',
            'email' => 'udin@example.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'Alice Johnson',
            'email' => 'alicejohnson@example.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'Bob Brown',
            'email' => 'bobbrown@example.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'Charlie Davis',
            'email' => 'charliedavis@example.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'Diana Evans',
            'email' => 'dianaevans@example.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'Ethan Harris',
            'email' => 'ethanharris@example.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'Fiona Clark',
            'email' => 'fionaclark@example.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'George Miller',
            'email' => 'georgemiller@example.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);
    }
}
