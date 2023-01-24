<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->string('internal_id')->nullable();
            $table->unsignedBigInteger('stock_keeping_unit_id');
            $table->unsignedBigInteger('service_id')->nullable();
            $table->string('product_name');
            $table->decimal('qty', 14, 2)->default(1);
            $table->decimal('price_base', 14, 2)->default(0);
            $table->decimal('dcto', 14, 2)->default(0);
            $table->decimal('price_sale', 14, 2)->default(0);
            $table->json('metadata')->nullable();

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('stock_keeping_unit_id')->references('id')->on('stock_keeping_units');
            
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
        Schema::dropIfExists('order_details');
    }
};
