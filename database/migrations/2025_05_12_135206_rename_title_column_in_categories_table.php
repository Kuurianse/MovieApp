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
            $table->renameColumn('title', 'name');
            // mengubah nama kolom title menjadi name
            // jika kolom title sudah ada, maka kita tidak perlu menambahkannya lagi
            // jika ingin rollback, mengubah nama kolom name menjadi title
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->renameColumn('name', 'title');
            // jika ingin rollback (php artisan migrate:rollback), mengubah nama kolom name menjadi title
        });
    }
};
