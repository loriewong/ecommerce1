<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBundleItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bundle_items', function (Blueprint $table) {
                    $table->unsignedInteger('bundleId');
                    $table->unsignedInteger('productId');
                    $table->unsignedInteger('attributeId');
                    $table->foreign('productId')->references('productId')->on('products');
                    $table->foreign('attributeId')->references('attributeId')->on('attributes');
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
        Schema::dropIfExists('bundle_items');
    }
}
