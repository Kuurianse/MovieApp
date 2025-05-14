<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //  bisa numpuk migrasi, php artisan make:migration "drop is_active and description in categories table"
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn(['is_active', 'description']);
            // menghapus kolom is_active dan description
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->boolean('is_active')->default(true);
            $table->string('description')->nullable();
            // jika rollback, tambahkan kolom is_active dan description
        });
    }
};
