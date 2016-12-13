<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CouponProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_products', function (Blueprint $table) {
            $table->unsignedInteger('couponId');
            $table->unsignedInteger('productId');
            $table->unsignedInteger('bundleId');
            $table->foreign('couponId')->references('couponId')->on('coupons');
        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupon_products');  
    }
}
