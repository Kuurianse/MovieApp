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
        Schema::table('categories', function (Blueprint $table) {
            $table->index('name');
            // menambahkan index pada kolom name
            // index digunakan untuk mempercepat pencarian data pada kolom name
            // jika ingin rollback, hapus index pada kolom name
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropIndex(['name']);
            // rollback index atau menghapus index pada kolom name
        });
    }
};
