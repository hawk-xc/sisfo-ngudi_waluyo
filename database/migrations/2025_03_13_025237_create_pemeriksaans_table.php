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
        Schema::create('pemeriksaans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_cek');
            $table->decimal('imt', 8, 2);
            $table->integer('tensi_sistolik');
            $table->integer('tensi_diastolik');
            $table->string('analisis_imt')->nullable();
            $table->string('analisis_tensi')->nullable();
            $table->foreignId('lansia_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaans');
    }
};
