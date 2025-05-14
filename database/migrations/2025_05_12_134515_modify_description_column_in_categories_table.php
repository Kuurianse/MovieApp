<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    // php artisan make:migration "modify description column in categories table"

    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('description')->nullable()->change();
            // mengubah tipe data kolom description text menjadi string
            // jika kolom description sudah ada, maka kita tidak perlu menambahkannya lagi
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
            // jika ingin rollback, mengubah tipe data kolom description string menjadi text
            // jadi up untuk melakukan perubahan, dan down untuk mengembalikan ke versi sebelumnya (rollback)
        });
    }
};
