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
        Schema::create('userpenggunas', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name', 255)->nullable(); // Nama klien (nullable)
            $table->string('phone', 255)->unique(); // Nomor telepon klien (unique)
            $table->string('email', 255)->nullable(); // Email klien (nullable)
            $table->string('password', 255)->nullable(); // Password klien (nullable)
            $table->string('position', 255)->nullable(); // Posisi klien (nullable)
            $table->timestamps(); // Timestamps created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userpenggunas');
    }
};
