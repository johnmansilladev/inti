<?php

use App\Models\Order;
use Illuminate\Support\Facades\Schema;
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
        Schema::create('history_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('old_status',[Order::PENDING,Order::PAID,Order::CANCELLED])->nullable();
            $table->enum('new_status',[Order::PENDING,Order::PAID,Order::CANCELLED]);
            $table->string('description')->nullable();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('user_id')->references('id')->on('users');
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

        Schema::dropIfExists('history_orders');
    }
};
