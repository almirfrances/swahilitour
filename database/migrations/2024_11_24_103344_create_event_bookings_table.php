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
        Schema::create('event_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('discount_percentage', 5, 2)->default(0); // Adds discount percentage after the price field
            $table->enum('booking_type', ['residential_single', 'foreign_single', 'residential_couple', 'foreign_couple']);
            $table->decimal('price', 8, 2);
            $table->enum('status', ['pending', 'canceled', 'completed'])->default('pending');
            $table->text('payment_proof')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_bookings');
    }
};