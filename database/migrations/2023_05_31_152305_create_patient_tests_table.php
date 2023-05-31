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
        Schema::create('patient_tests', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('patient_id');
            $table->string('scan_model');
            $table->string('detection_model');
            $table->text('travel_history');
            $table->text('symptoms');
            $table->string('result')->default('processing');
            $table->timestamps();
        });

        Schema::table('patient_tests', function (Blueprint $table) {
            $table->foreign('patient_id')->references('id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop relation first
        // Schema::table('patient_tests', function (Blueprint $table) {
        //     $table->dropForeign(['patient_id']);
        // });
        Schema::dropIfExists('patient_tests');
    }
};
