<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricings', function (Blueprint $table) {
            $table->id();
            $table->morphs('package'); // This creates package_type and package_id
            // Separate columns for each month
            $table->decimal('jan_resident_price', 8, 2)->nullable();
            $table->decimal('jan_foreign_price', 8, 2)->nullable();
            $table->decimal('jan_discount', 5, 2)->nullable();

            $table->decimal('feb_resident_price', 8, 2)->nullable();
            $table->decimal('feb_foreign_price', 8, 2)->nullable();
            $table->decimal('feb_discount', 5, 2)->nullable();

            $table->decimal('mar_resident_price', 8, 2)->nullable();
            $table->decimal('mar_foreign_price', 8, 2)->nullable();
            $table->decimal('mar_discount', 5, 2)->nullable();

            $table->decimal('apr_resident_price', 8, 2)->nullable();
            $table->decimal('apr_foreign_price', 8, 2)->nullable();
            $table->decimal('apr_discount', 5, 2)->nullable();

            $table->decimal('may_resident_price', 8, 2)->nullable();
            $table->decimal('may_foreign_price', 8, 2)->nullable();
            $table->decimal('may_discount', 5, 2)->nullable();

            $table->decimal('jun_resident_price', 8, 2)->nullable();
            $table->decimal('jun_foreign_price', 8, 2)->nullable();
            $table->decimal('jun_discount', 5, 2)->nullable();

            $table->decimal('jul_resident_price', 8, 2)->nullable();
            $table->decimal('jul_foreign_price', 8, 2)->nullable();
            $table->decimal('jul_discount', 5, 2)->nullable();

            $table->decimal('aug_resident_price', 8, 2)->nullable();
            $table->decimal('aug_foreign_price', 8, 2)->nullable();
            $table->decimal('aug_discount', 5, 2)->nullable();

            $table->decimal('sep_resident_price', 8, 2)->nullable();
            $table->decimal('sep_foreign_price', 8, 2)->nullable();
            $table->decimal('sep_discount', 5, 2)->nullable();

            $table->decimal('oct_resident_price', 8, 2)->nullable();
            $table->decimal('oct_foreign_price', 8, 2)->nullable();
            $table->decimal('oct_discount', 5, 2)->nullable();

            $table->decimal('nov_resident_price', 8, 2)->nullable();
            $table->decimal('nov_foreign_price', 8, 2)->nullable();
            $table->decimal('nov_discount', 5, 2)->nullable();

            $table->decimal('dec_resident_price', 8, 2)->nullable();
            $table->decimal('dec_foreign_price', 8, 2)->nullable();
            $table->decimal('dec_discount', 5, 2)->nullable();

            $table->timestamps();

            // Foreign key constraint if applicable
            // $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pricings');
    }
}