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
        Schema::table('lansias', function (Blueprint $table) {
            $table->string('status_perkawinan')->nullable();
            $table->string('agama')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('golongan_darah')->nullable();
            $table->string('rhesus')->nullable();
            $table->text('riwayat_kesehatan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lansias', function (Blueprint $table) {
            $table->dropColumn([
                'status_perkawinan',
                'agama',
                'pendidikan_terakhir',
                'golongan_darah',
                'rhesus',
                'riwayat_kesehatan'
            ]);
        });
    }
};
