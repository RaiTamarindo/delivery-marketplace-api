<?php

require_once __DIR__ . '/../../bootstrap.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

Capsule::schema()->create('store_products', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->decimal('price', 10, 2);
    $table->boolean('is_available');
    $table->timestamps();
    $table->softDeletes();
});
