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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('type_id')->constrained('types')->onDelete('cascade'); // Foreign key for Type model
            $table->foreignId('destination_id')->constrained('destinations')->onDelete('cascade'); // Foreign key for Destination model
            $table->json('images')->nullable(); // Store multiple images as JSON array
            $table->json('event_plan')->nullable(); // Store event plans (array of titles and descriptions)
            $table->string('slug')->unique();
            $table->decimal('residential_price_single', 10, 2);
            $table->decimal('foreign_price_single', 10, 2);
            $table->decimal('couple_foreign_price', 10, 2);
            $table->decimal('couple_residential_price', 10, 2);
            $table->integer('discount_percentage')->default(0); // Discount applied to both foreigner and residential
            $table->enum('status', ['active', 'inactive'])->default('inactive'); // Event status
            $table->json('amenities')->nullable(); // Store selected amenities as JSON array
            $table->text('overview'); // Event overview
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};