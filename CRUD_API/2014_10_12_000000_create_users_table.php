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
            $table->id('Id');
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('Email')->unique();
            $table->string('PasswordHash');
            $table->string('Role')->default('User');
            $table->string('Department')->nullable();
            $table->boolean('IsActive')->default(true);
            $table->string('ProfileImageUrl')->nullable();
            $table->dateTime('LastSeenDate')->nullable();
            $table->dateTime('CreatedDate')->nullable();
            $table->dateTime('UpdatedDate')->nullable();
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
