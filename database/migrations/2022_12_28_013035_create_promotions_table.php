<?php

use App\Models\Promotion;
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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->enum('type_promotion',[Promotion::PERCENTAGE,Promotion::FIXED_AMOUNT]);
            $table->enum('apply_to',[Promotion::PRODUCT,Promotion::SERVICE]);
            $table->decimal('discount_rate', 14, 2)->default(0);
            $table->dateTime('date_from');
            $table->dateTime('date_to');
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('promotions');
    }
};
