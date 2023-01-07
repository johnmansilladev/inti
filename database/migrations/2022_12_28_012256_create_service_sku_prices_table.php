<?php

use App\Models\ServiceSkuPrice;
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
        Schema::create('service_sku_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stock_keeping_unit_id');
            $table->unsignedBigInteger('service_id')->nullable();
            $table->enum('apply_to',[ServiceSkuPrice::PRODUCT,ServiceSkuPrice::SERVICE])->default(ServiceSkuPrice::SERVICE);
            $table->decimal('cost_price', 14, 2)->default(0);
            $table->decimal('markup', 14, 2)->default(0);
            $table->decimal('base_price', 14, 2)->default(0);
            $table->decimal('dcto', 14, 2)->default(0); 
            $table->decimal('sale_price', 14, 2)->default(0);      
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
        Schema::dropIfExists('service_sku_prices');
    }
};
