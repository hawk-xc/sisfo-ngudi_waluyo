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
        Schema::table('pemeriksaan', function (Blueprint $table) {
            $table->string('mentality_check')->nullable()->after('tensi_diastolik');
            $table->string('healthy_check')->nullable()->after('mentality_check');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemeriksaan', function (Blueprint $table) {
            $table->dropColumn('mentality_check');
            $table->dropColumn('healthy_check');
        });
    }
};
