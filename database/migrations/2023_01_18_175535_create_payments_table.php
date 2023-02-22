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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('method');
            $table->string('issuer_name');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->decimal('amount', 14,2);
            $table->string('transaction_code')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('user_id');

            $table->foreign('country_id')->references('id')->on('countries');
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
        Schema::dropIfExists('payments');
    }
};
