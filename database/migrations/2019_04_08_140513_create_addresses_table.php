<?php

require_once __DIR__ . '/../../bootstrap.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

Capsule::schema()->create('addresses', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string('zipcode', 8)->nullable();
    $table->string('city', 128);
    $table->string('district', 128);
    $table->string('street', 128);
    $table->string('building_number', 16);
    $table->double('latitude', 10, 8);
    $table->double('longitude', 10, 8);
    $table->timestamps();
});
