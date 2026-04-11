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
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->mediumText('value');
<<<<<<< HEAD
<<<<<<< HEAD
            $table->integer('expiration')->index();
=======
            $table->integer('expiration');
>>>>>>> 6cbe6e64ea295590b9ddd9aea98fc5d30f3e768d
=======
            $table->integer('expiration');
>>>>>>> 6cbe6e64ea295590b9ddd9aea98fc5d30f3e768d
        });

        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('owner');
<<<<<<< HEAD
<<<<<<< HEAD
            $table->integer('expiration')->index();
=======
            $table->integer('expiration');
>>>>>>> 6cbe6e64ea295590b9ddd9aea98fc5d30f3e768d
=======
            $table->integer('expiration');
>>>>>>> 6cbe6e64ea295590b9ddd9aea98fc5d30f3e768d
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};
