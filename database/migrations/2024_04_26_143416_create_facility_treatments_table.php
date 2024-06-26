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
        Schema::create('facility_treatments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facility_id')->constrained('facilities')
            ->cascadeOnDelete();
            $table->foreignId('treatment_id')->constrained('treatments')
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
        Schema::dropIfExists('facility_treatments');
    }
};
