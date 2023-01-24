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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('nro_order');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('contact_name');
            $table->string('email');
            $table->enum('contact_medium',[Order::WHATSAPP,Order::EMAIL,Order::FACEBOOK,Order::SKYPE,Order::TELEGRAM,Order::WECHAT])->default(Order::WHATSAPP);
            $table->string('contact_information');
            $table->enum('status',[Order::PENDING,Order::RECEIVED,Order::IN_PROCESS,Order::DELIVERED,Order::CANCELLED])->default(Order::PENDING);
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
        Schema::dropIfExists('orders');
    }
};
