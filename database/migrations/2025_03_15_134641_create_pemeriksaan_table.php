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
        Schema::create('pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->uuid('id_pemeriksaan')->unique();
            $table->unsignedBigInteger('gizi_id')->nullable(false);
            $table->foreignId('lansia_id')->constrained('lansias')->onDelete('cascade');
            $table->date('tanggal_cek');
            $table->decimal('berat_badan', 8, 2)->nullable();
            $table->decimal('imt', 8, 2);
            $table->string('analisis_imt')->nullable();
            $table->integer('tensi_sistolik');
            $table->string('analisis_tensi')->nullable();
            $table->decimal('tinggi_lansia', 8, 2)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->integer('tensi_diastolik');
            $table->timestamps();

            // Foreign key constraint untuk gizi_id
            $table->foreign('gizi_id')->references('id')->on('gizi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan');
    }
};
