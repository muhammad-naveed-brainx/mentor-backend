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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['blank', 'multiple_choice', 'short_question'])->nullable();
            $table->text('stem')->nullable();
            $table->text('option_a')->nullable();
            $table->text('option_b')->nullable();
            $table->text('option_c')->nullable();
            $table->text('option_d')->nullable();
            $table->text('correct_answer')->nullable();
            $table->text('explanation')->nullable();
            $table->string('image_url')->nullable();
            $table->string('image_path')->nullable();
            $table->boolean('is_approved')->default(false);
            $table->unsignedBigInteger('heading_id')->nullable();
            $table->foreignId('chapter_id')->references('id')->on('chapters')->onDelete('restrict');
            $table->foreignId('academic_subject_id')->references('id')->on('academic_subjects')->onDelete('restrict');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('user_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
