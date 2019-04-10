<?php

require_once __DIR__ . '/../../bootstrap.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

Capsule::schema()->table('routes', function(Blueprint $table) {
    $table->unsignedBigInteger('address_id');
    $table->unsignedBigInteger('store_id');
    $table->foreign('address_id')->references('id')->on('addresses');
    $table->foreign('store_id')->references('id')->on('stores');
});
