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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->enum('type', ['default', 'dropdown', 'megamenu'])->default('default');
            $table->unsignedBigInteger('page_id')->nullable();
            $table->enum('position', ['navbar', 'footer', 'none'])->default('none');
            $table->integer('order')->default(0);
            $table->foreign('parent_id')->references('id')->on('menus')->onDelete('set null');
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};