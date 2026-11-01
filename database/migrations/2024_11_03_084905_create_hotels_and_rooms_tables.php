<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsAndRoomsTables extends Migration
{
    public function up()
    {
        // Create the hotels table
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('destination_id')->constrained()->onDelete('cascade'); // Link to destinations table
            $table->string('slug')->unique();
            $table->json('images')->nullable(); // Store images as a JSON array
            $table->text('overview')->nullable();
            $table->json('amenities')->nullable(); // Store amenities as JSON array (e.g., ["wifi", "pool"])

            $table->enum('status', ['active', 'inactive', 'under_maintenance'])->default('active'); // Hotel status
            $table->decimal('starting_price', 10, 2)->nullable(); // Starting price for display purposes
            $table->boolean('featured')->default(false); // Flag for featured hotels
            $table->timestamps();
        });

        // Create the rooms table
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->constrained()->onDelete('cascade'); // Link to hotels table
            $table->string('room_name');
            $table->decimal('price', 10, 2); // Room price
            $table->integer('capacity')->default(2); // Room capacity (number of guests)
            $table->enum('room_type', ['single', 'double', 'suite', 'family'])->default('double'); // Room type
            $table->boolean('is_available')->default(true); // Availability status

            $table->enum('status', ['available', 'booked', 'under_maintenance'])->default('available'); // Room status
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
        Schema::dropIfExists('hotels');
    }
}