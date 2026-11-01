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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->morphs('reviewable'); // Polymorphic relation to handle both hotels and tours
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->text('comment');
            $table->decimal('service_rating', 2, 1);
            $table->decimal('location_rating', 2, 1);
            $table->decimal('amenities_rating', 2, 1);
            $table->decimal('price_rating', 2, 1);
            $table->decimal('average_rating', 2, 1)->storedAs('(service_rating + location_rating + amenities_rating + price_rating) / 4');
            $table->unsignedBigInteger('admin_reply_id')->nullable(); // ID of the admin who replied
            $table->text('admin_reply')->nullable(); // Text of the admin's reply
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('admin_reply_id')->references('id')->on('admins')->onDelete('set null'); // Assuming 'admins' table exists
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};