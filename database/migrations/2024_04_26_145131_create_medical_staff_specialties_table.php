<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('medical_staff_specialties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medical_staff_id')
            ->constrained('medical_staff')
            ->cascadeOnDelete();
            $table->foreignId('specialty_id')
            ->constrained('specialties')
            ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_staff_specialties');
    }
};
