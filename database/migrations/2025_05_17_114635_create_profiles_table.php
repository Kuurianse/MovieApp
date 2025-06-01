<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique(); // user_id sebagai foreign key dari tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // jika user dihapus, maka profile juga akan dihapus
            $table->string('phone');
            $table->string('address')->nullable(); // alamat bisa kosong
            $table->timestamps();
        });
    }
    /*
        unsigned: Artinya nilai kolom tidak bisa negatif. Nilai hanya bisa dimulai dari 0
        BigInteger: Tipe data ini digunakan untuk menyimpan angka yang sangat besar

        foreign('user_id'): Menjadikan user_id sebagai foreign key.
        references('id')->on('users'): Menghubungkan user_id ke kolom id di tabel users.
        onDelete('cascade'): Jika pengguna dihapus dari tabel users, maka profilnya di tabel profiles juga akan dihapus.
    */

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles'); // menghapus tabel profiles jika rollback
    }
};
