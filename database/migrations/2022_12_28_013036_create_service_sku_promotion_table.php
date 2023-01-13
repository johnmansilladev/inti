<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_sku_promotion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->unsignedBigInteger('stock_keeping_unit_id');
            $table->unsignedBigInteger('promotion_id');
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('stock_keeping_unit_id')->references('id')->on('stock_keeping_units');
            $table->foreign('promotion_id')->references('id')->on('promotions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_sku_promotion');
    }
};
