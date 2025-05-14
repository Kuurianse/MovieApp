<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    // php artisan make:controller CategoryController
    public function index()
    {
        // $categories = DB::table('categories')->get();    // get untuk mengambil semua data dari tabel categories
        // $categories = DB::table('categories')->select(['id', 'name', 'slug'])->get();    // select untuk mengambil kolom id, name, slug dari tabel categories
        // $categories = DB::table('categories')->whereIn('id', [1, 3, 5])->get();  // whereIn untuk mengambil data dengan id 1, 3, 5 dari tabel categories
        // $categories = DB::table('categories')->where('name', 'like', '%action%')->get();     // where untuk mengambil data dengan nama yang mengandung kata action dari tabel categories
        // $categories = DB::table('categories')->where('id', 4)->select(['id', 'name', 'slug'])->first();     // mengambil data dengan id 4 dari tabel, first untuk mengambil satu data pertama dan mengembalikan data dalam bentuk objek bukan array

        // Menggunakan Eloquent ORM
        // $categories = Category::all();                                          // mengambil semua data dari tabel categories
        // $categories = Category::select(['id', 'name', 'slug'])->get();       // mengambil kolom id, name, slug dari tabel categories
        $categories = Category::whereIn('id', [1, 3, 5])->get();             // mengambil data dengan id 1, 3, 5 dari tabel categories
        // $categories = Category::where('name', 'like', '%action%')->get();    // mengambil data dengan nama yang mengandung kata action dari tabel categories
        // $categories = Category::where('id', 4)->select(['id', 'name', 'slug'])->first();     // mengambil data dengan id 4 dari tabel, first untuk mengambil satu data pertama dan mengembalikan data dalam bentuk objek bukan array

        return $categories;
        // mengembalikan data dalam format JSON
    }
}
