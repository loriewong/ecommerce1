<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('orderdetails', function (Blueprint $table) {
                    $table->unsignedInteger('orderId');
                    $table->unsignedInteger('productId');
                    $table->unsignedInteger('attributeId');
                    $table->unsignedInteger('bundleId');
                    $table->unsignedInteger('quantity');
                    $table->decimal('price', 5, 2);
                    $table->foreign('productId')->references('productId')->on('products');
                    $table->foreign('attributeId')->references('attributeId')->on('attributes');
                    $table->foreign('orderId')->references('orderId')->on('orders');
                    $table->foreign('bundleId')->references('bundleId')->on('bundles');

                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderdetails');
    }
}
