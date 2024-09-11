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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('title');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->tinyInteger('gender')->nullable();
            $table->date('dob');
            $table->tinyInteger('primary_lang')->nullable();
            $table->foreignId('birth_country_id')->constrained('countries')->onDelete('no action');
            $table->string('picture')->nullable();
            $table->string('phone')->unique()->indexed();
            $table->string('email')->unique()->indexed();
            $table->text('address');
            $table->string('post_code', 10);
            $table->foreignId('city_id')->constrained('cities')->onDelete('no action');
            $table->foreignId('state_id')->constrained('states')->onDelete('no action');
            $table->foreignId('country_id')->constrained('countries')->onDelete('no action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
