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
        Schema::table('patient_tests', function (Blueprint $table) {
            $table->dropColumn('result');
        });
        Schema::table('patient_tests', function (Blueprint $table) {
            $table->json('result')->after('symptoms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patient_tests', function (Blueprint $table) {
            $table->dropColumn('result');
        });
        Schema::table('patient_tests', function (Blueprint $table) {
            $table->string('result')->default('processing');
        });
    }
};
