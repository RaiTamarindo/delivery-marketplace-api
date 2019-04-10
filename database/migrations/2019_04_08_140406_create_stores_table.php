<?php

require_once __DIR__ . '/../../bootstrap.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

Capsule::schema()->create('stores', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string('name', 64);
    $table->string('image', 512)->nullable();
    $table->double('latitude', 10, 8);
    $table->double('longitude', 10, 8);
    $table->timestamps();
    $table->softDeletes();
});
