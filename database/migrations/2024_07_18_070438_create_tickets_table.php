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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('assign_to')->constrained('users')->onDelete('cascade');
            $table->foreignId('module_id')->constrained('modules')->onDelete('cascade');
            $table->dateTime('date');
            $table->enum('category', ['category1', 'category2', 'category3']); 
            $table->enum('level', ['level1', 'level2', 'level3']); 
            $table->string('db_location', 255)->nullable();
            $table->string('problem', 1000)->nullable();
            $table->string('technical_notes', 1000)->nullable();
            $table->boolean('is_done')->default(false);
            $table->dateTime('estimation_date')->nullable();
            $table->dateTime('finish_date')->nullable();
            $table->string('is_done_in_version', 10)->nullable();
            $table->string('program_version', 10)->nullable();
            $table->boolean('feedback_required');
            $table->string('attachment', 500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
