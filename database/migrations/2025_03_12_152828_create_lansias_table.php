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
        Schema::create('lansias', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('nama');
            $table->integer('umur');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->decimal('berat_badan', 8, 2);
            $table->decimal('tinggi_lansia', 8, 2);
            $table->foreignId('posyandu_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lansias');
    }
};
