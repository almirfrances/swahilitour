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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('country');
            $table->string('visa_requirements');
            $table->string('language_spoken');
            $table->decimal('area', 10, 2); // Assuming area is in square kilometers
            $table->json('images')->nullable(); // Storing images as JSON
            $table->json('faq')->nullable(); // Storing FAQs as JSON
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};