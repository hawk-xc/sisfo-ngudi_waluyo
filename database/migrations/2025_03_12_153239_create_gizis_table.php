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
        Schema::create('gizis', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_gizi');
            $table->date('tanggal');
            $table->string('menu');
            $table->string('bahan_makanan');
            $table->decimal('berat', 8, 2);
            $table->string('urt');
            $table->decimal('harga', 8, 2);
            $table->string('keterangan')->nullable();
            $table->foreignId('posyandu_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gizis');
    }
};
