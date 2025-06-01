<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        $categories = Category::all();                                          // mengambil semua data dari tabel categories
        // $categories = Category::select(['id', 'name', 'slug'])->get();       // mengambil kolom id, name, slug dari tabel categories
        // $categories = Category::whereIn('id', [1, 3, 5])->get();             // mengambil data dengan id 1, 3, 5 dari tabel categories
        // $categories = Category::where('name', 'like', '%action%')->get();    // mengambil data dengan nama yang mengandung kata action dari tabel categories
        // $categories = Category::where('id', 4)->select(['id', 'name', 'slug'])->first();     // mengambil data dengan id 4 dari tabel, first untuk mengambil satu data pertama dan mengembalikan data dalam bentuk objek bukan array

        return $categories;
        // mengembalikan data dalam format JSON
    }

    public function store(Request $request)
    {
        // postman POST body none, 2 dibagian dibawah ini query builder
        // $categories = DB::table('categories')->insert([
        //     ['name' => 'Komedi', 'slug' => Str::of('Komedi')->slug(), 'created_at' => now(), 'updated_at' => now()],
        //     ['name' => 'Drama Jepang', 'slug' => Str::of('Drama Jepang')->slug(), 'created_at' => now(), 'updated_at' => now()],
        // ]);
            
        // postman POST body raw {"name":"Aksi"}
        // $categories = DB::table('categories')->insert([
        //     'name' => $request['name'],
        //     'slug' => Str::of($request['name'])->slug(),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // return $categories;

        // Beda sama yang diatas, karena pake insert created_at dan updated_at harus manual diisi, tapi kalo yg dibawah otomatis diisi oleh Laravel
        // postman POST body raw {"name":"Aksi"}
        // $category = new Category();
        // $category->name = $request->name; // sama aja dengan $request['name']
        // $category->slug = Str::of($request->name)->slug();
        // $category->save(); // menyimpan data ke dalam tabel categories

        // postman POST body raw {"name":"Aksi"}
        // $category = Category::create([
        //     'name' => $request->name,
        //     'slug' => Str::of($request->name)->slug(),
        // ]); // lebih simple, tapi pastikan model Category sudah ada fillable
        
        // return $category;
        
        // Menambahkan banyak data sekaligus, postman POST body none
        $categories = Category::insert([
            ['name' => 'Komedi2', 'slug' => Str::of('Komedi2')->slug(), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Drama Jepang2', 'slug' => Str::of('Drama Jepang2')->slug(), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Aksi2', 'slug' => Str::of('Aksi2')->slug(), 'created_at' => now(), 'updated_at' => now()],
        ]);

        return $categories;
    }

    public function update(Request $request, $id)
    {
        // Postman http://movie.test/categories/1 Headers (Content-Type: application/json) Body raw {"name":"Action aksi"}
        // sama aja dengan yang dibawah ini

        // cara 1
        // $category = Category::find($id); 
        // $category = Category::findOrFail($id); // findOrFail untuk mencari data berdasarkan id, jika tidak ditemukan akan mengembalikan 404 not found 
        // if ($category) {
        //     $category->name = $request['name']; // sama aja dengan $request['name']
        //     $category->slug = Str::of($request['name'])->slug();
        //     $category->save(); // menyimpan data ke dalam tabel categories, dan automatically updates the updated_at column
        //     return response()->json([
        //         'message' => 'Data berhasil diupdate',
        //         'data' => $category
        //     ]);
        // } else {
        //     return response()->json([
        //         'message' => 'Data tidak ditemukan'
        //     ], 404);
        // }

        // cara 2
        // $category = DB::table('categories')->where('id', $id)->update([
        //     'name' => $request->name,
        //     'slug' => Str::of($request->name)->slug(),
        //     'updated_at' => now()
        // ]);

        // cara 3
        $category = Category::where('id', $id)->update([
            'name' => $request->name,
            'slug' => Str::of($request->name)->slug(),
            'updated_at' => now()
        ]);

        return $category;
    }

    public function destroy(Request $request, $id){
        // Postman http://movie.test/categories/1 Headers (Content-Type: application/json) Body raw none

        // $category = Category::destroy(10);   // menghapus data dengan id 10 dari tabel categories
        
        //$category = DB::table('categories')->where('id', $id)->delete(); // menghapus data dari tabel categories

        // Cara terbaik adalah menggunakan Eloquent ORM dengan findOrFail untuk memastikan data ditemukan sebelum dihapus.
        $category = Category::findOrFail($id); // findOrFail untuk mencari data berdasarkan id, jika tidak ditemukan akan mengembalikan 404 not found 
        $category->delete(); // menghapus data dari tabel categories
        return response()->json([
            'data' => $category,
            'message' => 'Data berhasil dihapus',
        ]);

        return $category;
    }
}
