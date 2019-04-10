<?php

require_once __DIR__ . '/../../bootstrap.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

Capsule::schema()->table('store_products', function(Blueprint $table) {
    $table->unsignedBigInteger('store_id');
    $table->unsignedBigInteger('product_id');
    $table->foreign('store_id')->references('id')->on('stores');
    $table->foreign('product_id')->references('id')->on('products');
});
