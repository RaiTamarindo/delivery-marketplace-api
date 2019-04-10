<?php

require_once __DIR__ . '/../../bootstrap.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

Capsule::schema()->create('products', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string('barcode', 128);
    $table->string('name', 64);
    $table->text('description');
    $table->timestamps();
    $table->softDeletes();
});
