<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignConstraintsRoutes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('routes', function(Blueprint $table) {
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('store_id');
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('store_id')->references('id')->on('stores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('routes', function(Blueprint $table) {
            $table->dropForeign('routes_address_id_foreign');
            $table->dropForeign('routes_store_id_foreign');
            $table->dropColumn('address_id');
            $table->dropColumn('store_id');
        });
    }
}
