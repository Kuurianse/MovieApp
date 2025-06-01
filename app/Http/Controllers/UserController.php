<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // membuat user yang sudah ada di database
    public function createProfile()
    {
        $user = User::findOrFail(2); // mencari user dengan id 1, jika tidak ada maka akan mengembalikan 404 not found
        
        // profile() adalah nama function yang ada di model User
        $user->profile()->create([
            'phone' => '08123456789',
            'address' => 'Jl. Raya No. 1',
        ]);
        // membuat profile baru untuk user dengan id 1

        return response()->json([
            'message' => 'Profile created successfully',
            'data' => $user->profile->fresh(),
        ]);
    }

    public function userProfile($id)
    {
        
        $user = User::findOrFail($id); // mencari user dengan id 1, jika tidak ada maka akan mengembalikan 404 not found
        
        // lazy loading, hanya memanggil data profile jika dibutuhkan
        // return $user->profile;
        
        // eager loading, memanggil data profile bersamaan dengan user
        // return $user->load('profile');

        // eager loading, menambahkan protected $with = ['profile']; di model User
        return $user;
    }

    /**/
    public function updateProfile($id)
    {
        $user = User::findOrFail($id);
        /*
            update profile untuk user dengan id tertentu
            jika profile tidak ada maka akan membuat profile baru
            jika profile ada maka akan mengupdate profile yang sudah ada
        */
        $user->profile()->update([
            'phone' => '333333333',
            'address' => 'Jl. Raya No. 300',
        ]);

        return response()->json([
            'message' => 'Profile updated successfully',
            'data' => $user->fresh(), // memanggil data profile yang sudah diupdate
        ]);
    }

    public function deleteProfile($id)
    {
        $user = User::findOrFail($id);
        // menghapus profile untuk user dengan id tertentu
        $user->profile()->delete();
        // $user->delete(); // menghapus user dari database
        /*
            hanya menghapus profil pengguna, bukan pengguna itu sendiri 
            $user->profile(): Ini adalah pemanggilan relasi antara model User dan Profile. 
            Biasanya, ini didefinisikan di model User menggunakan relasi seperti hasOne atau hasMany.
        */
        return response()->json([
            'message' => 'Profile deleted successfully',
        ]);
    }
}
