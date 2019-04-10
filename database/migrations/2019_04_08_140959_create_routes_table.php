<?php

require_once __DIR__ . '/../../bootstrap.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

Capsule::schema()->create('routes', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->decimal('distance', 5, 2);
    $table->boolean('is_straight_line');
    $table->timestamps();
});
