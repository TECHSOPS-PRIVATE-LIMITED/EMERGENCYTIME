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
            $table->string('email', 255)->unique();
            $table->string('medical_license_number', 50)->unique();
            $table->enum('gender', ['male', 'female', 'other']);
            $table->enum('current_employment',['yes','no']);
            $table->date('dob');
            $table->string('address', 255);
            $table->string('phone', 20);
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
