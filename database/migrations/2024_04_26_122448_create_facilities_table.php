<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->enum('type',['hospital','clinic','consultancy','daycare','lab','diagnostic']);
            $table->string('email', 255);
            $table->string('phone_number', 15);
            $table->tinyText('address');
            $table->string('city', 60);
            $table->string('state', 60);
            $table->string('postal_code', 10);
            $table->foreignId('country_id')->constrained('countries')
                   ->cascadeOnDelete();
            $table->integer('number_of_beds')->nullable();
            $table->enum('hipaa_status',['yes','no'])->default('no');
            $table->string('opening_hours', 50);
            $table->string('closing_hours', 50)->nullable();
            $table->string('emergency_contact', 15)->nullable();
            $table->string('website', 255)->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->foreignId('user_id')->constrained('users')
                  ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('facilities');
    }
};
