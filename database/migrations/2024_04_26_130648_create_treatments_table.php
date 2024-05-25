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
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->string('disease_name', 255)->unique();
            $table->foreignId('category_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->tinyText('description')->nullable();
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->tinyText('precautions')->nullable();
            $table->tinyText('symptoms')->nullable();
            $table->tinyText('medications')->nullable();
            $table->tinyText('procedures')->nullable();
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
        Schema::dropIfExists('treatments');
    }
};
