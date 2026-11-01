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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->morphs('bookable'); // Creates bookable_type and bookable_id for polymorphic relations
            $table->foreignId('room_id')->nullable()->constrained()->onDelete('cascade'); // Only for hotel bookings
            $table->date('start_date')->nullable(); // Only for hotel bookings
            $table->date('end_date')->nullable(); // Only for hotel bookings
            $table->integer('guests')->default(1);
            $table->string('guest_type')->nullable(); // Only for tour bookings (resident/foreigner)
            $table->integer('children_count')->default(0); // Only for tour bookings
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};