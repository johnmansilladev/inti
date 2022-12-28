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
        Schema::create('stock_keeping_unit_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stock_keeping_unit_id');
            $table->string('currency_type_id');
            $table->decimal('cost_price', 14, 2)->default(0);
            $table->decimal('markup', 14, 2)->default(0);
            $table->decimal('base_price', 14, 2)->default(0);
            $table->foreign('stock_keeping_unit_id')->references('id')->on('stock_keeping_units');
            $table->foreign('currency_type_id')->references('id')->on('currency_types');
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
        Schema::dropIfExists('stock_keeping_unit_prices');
    }
};
