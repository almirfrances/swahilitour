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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tour name
            $table->string('slug')->unique(); // Slug for SEO
            $table->string('duration'); // Duration (e.g., "3 days")
            $table->integer('min_age'); // Minimum age requirement
            $table->foreignId('type_id')->constrained('types')->onDelete('cascade'); // Type (foreign key to types table)
            $table->foreignId('destination_id')->constrained('destinations')->onDelete('cascade'); // Destination (foreign key to destinations table)
            $table->text('overview'); // Tour description
            $table->json('amenities')->nullable(); // Store multiple amenities as JSON
            $table->json('includes')->nullable(); // Array of inclusions (stored as JSON)
            $table->json('excludes')->nullable(); // Array of exclusions (stored as JSON)
            $table->json('tour_plan')->nullable(); // Tour plan (stored as JSON)
            $table->json('images')->nullable(); // Array of images (stored as JSON)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};