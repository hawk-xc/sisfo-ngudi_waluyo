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
        Schema::create('gizi', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_gizi')->nullable();
            $table->string('urt')->nullable();
            $table->string('menu')->nullable();
            $table->boolean('status')->default(false);
            $table->string('bahan_makanan')->nullable(false);
            $table->string('berat');
            $table->string('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gizi');
    }
};
