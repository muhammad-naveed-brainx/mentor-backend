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
        Schema::create('sub_headings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->longText('explanation');   //  ,,,chapter_id
            $table->string('image_url')->nullable();
            $table->string('image_path')->nullable();
            $table->foreignId('heading_id')->references('id')->on('headings')->onDelete('restrict');
            $table->foreignId('chapter_id')->references('id')->on('chapters')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_headings');
    }
};
