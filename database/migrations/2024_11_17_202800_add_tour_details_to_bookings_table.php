<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('tour_name')->nullable(); // Optional: only for tour bookings
            $table->string('destination')->nullable(); // Optional: only for tour bookings
            $table->string('hotel_name')->nullable();
            $table->string('room_type')->nullable();
            $table->string('room_price')->nullable();
            $table->string('room_name')->nullable();
            $table->decimal('discount', 5, 2)->nullable()->default(0); // Optional: Discount percentage
            $table->decimal('discount_amount', 10, 2)->nullable()->default(0); // Calculated discount amount
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['tour_name', 'destination', 'discount', 'discount_amount']);
        });
    }
};