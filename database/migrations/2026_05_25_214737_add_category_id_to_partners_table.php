<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('partners', function (Blueprint $table) {
            // Periksa dulu, jika kolom belum ada, paksa tambahkan!
            if (!Schema::hasColumn('partners', 'category_id')) {
                $table->unsignedBigInteger('category_id')->nullable()->after('id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('partners', function (Blueprint $table) {
            if (Schema::hasColumn('partners', 'category_id')) {
                $table->dropColumn('category_id');
            }
        });
    }
};