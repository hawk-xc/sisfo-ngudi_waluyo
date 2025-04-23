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
            $table->string('kewarganegaraan')->nullable()->after('pj_nama');
            $table->string('pekerjaan')->nullable()->after('kewarganegaraan');
            $table->string('suku')->nullable()->after('pekerjaan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lansias', function (Blueprint $table) {
            $table->dropColumn('kewarganegaraan');
            $table->dropColumn('pekerjaan');
            $table->dropColumn('suku');
        });
    }
};
