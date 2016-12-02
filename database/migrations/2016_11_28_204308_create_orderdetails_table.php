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
                    $table->integer('orderId');
                    $table->integer('productId');
                    $table->integer('attributeId');
                    $table->integer('bundleId');
                    $table->integer('quantity');
                    $table->decimal('price', 5, 2);
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
