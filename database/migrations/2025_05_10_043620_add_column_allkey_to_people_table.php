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
        Schema::table('people', function (Blueprint $table) {
            $table->foreignId('company_id');
            $table->string('name');
            $table->string('address');
            $table->string('email');
            $table->string('department');
            $table->string('position');
            $table->string('phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('people', function (Blueprint $table) {
            $table->dropColumn('company_id');
            $table->dropColumn('name');
            $table->dropColumn('address');
            $table->dropColumn('email');
            $table->dropColumn('position');
            $table->dropColumn('department');
            $table->dropColumn('phone');
        });
    }
};
