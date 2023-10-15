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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('email')->unique();
            $table->enum('role', ['student', 'teacher', 'organization_admin', 'admin'])->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('academic_class')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('organization_name')->nullable();
            $table->foreignId('organization_id')->nullable();
            $table->integer('verification_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('mobile_no_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->timestamp('password_reset_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
