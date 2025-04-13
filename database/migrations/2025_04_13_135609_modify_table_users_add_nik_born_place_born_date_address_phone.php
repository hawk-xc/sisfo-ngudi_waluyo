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
        Schema::table('users', function (Blueprint $table) {
            $table->string('nik')->nullable()->after('id')->unique();
            $table->string('born_place')->nullable()->after('nik');
            $table->date('born_date')->nullable()->after('born_place');
            $table->string('address')->nullable()->after('born_date');
            $table->string('phone')->nullable()->after('address');
            $table->string('gender')->nullable()->after('phone');
            $table->string('relationship_name')->nullable()->after('gender');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nik');
            $table->dropColumn('born_place');
            $table->dropColumn('born_date');
            $table->dropColumn('address');
            $table->dropColumn('phone');
            $table->dropColumn('gender');
            $table->dropColumn('relationship_name');
        });
    }
};
