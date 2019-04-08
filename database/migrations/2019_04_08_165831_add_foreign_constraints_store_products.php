<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignConstraintsStoreProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('store_products', function(Blueprint $table) {
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('store_id')->references('id')->on('stores');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('store_products', function(Blueprint $table) {
            $table->dropForeign('store_products_store_id_foreign');
            $table->dropForeign('store_products_product_id_foreign');
            $table->dropColumn('store_id');
            $table->dropColumn('product_id');
        });
    }
}
