<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('medical_staff', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->string('role', 50)->unique();
            $table->string('image', 255)->nullable();
            $table->text('description')->nullable();
            $table->foreignId('facility_id')->nullable()->constrained('facilities')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')
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
        Schema::dropIfExists('medical_staff');
    }
};
