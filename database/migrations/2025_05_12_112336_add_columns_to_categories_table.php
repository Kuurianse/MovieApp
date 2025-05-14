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
        // menambahkan kolom baru ke tabel categories
        Schema::table('categories', function (Blueprint $table) {
            $table->boolean('is_active')->default(true);
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn(['is_active', 'description']);
        // rollback kolom yang ditambahkan, jika suatu saat kita ingin mengembalikan ke versi sebelumnya (atau menghapus kolom yang ditambahkan)
        // jika rollback, hapus kolom is_active dan description
        // php artisan migrate:rollback, akan menghapus kolom is_active dan description
        });
    }
};
