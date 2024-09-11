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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('status')->default(1);
            $table->string('name')->indexed();
            $table->string('short_name')->indexed();
            $table->integer('years')->nullable();
            $table->foreignId('course_level_id')->constrained('course_levels')->onDelete('no action')->indexed();
            $table->foreignId('department_id')->constrained('departments')->onDelete('no action')->indexed();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
