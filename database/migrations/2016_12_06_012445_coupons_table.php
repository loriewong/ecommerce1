<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('couponId');
            $table->string('couponCode');
            $table->string('description');
            $table->unsignedInteger('typeId');
            $table->dateTime('startdate');
            $table->dateTime('enddate');
            $table->unsignedInteger('quantity');
            $table->timestamps();
            $table->foreign('typeId')->references('typeId')->on('coupon_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');    }
}
