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
         // Create a new migration or adjust the existing one for amenities
        Schema::table('amenities', function (Blueprint $table) {
        $table->unsignedBigInteger('event_id')->nullable();
        $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('amenities', function (Blueprint $table) {
            //
        });
    }
};