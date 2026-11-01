<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->boolean('featured')->default(false); // Add featured flag
            $table->string('video_link')->nullable(); // Add YouTube video link
        });
    }

    public function down()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn('featured');
            $table->dropColumn('video_link');
        });
    }
};