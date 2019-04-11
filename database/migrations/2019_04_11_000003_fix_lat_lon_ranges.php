<?php

require_once __DIR__ . '/../../bootstrap.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

Capsule::schema()->table('stores', function (Blueprint $table) {
    $table->float('latitude', 18, 15);
    $table->float('longitude', 18, 15);
});

Capsule::schema()->table('addresses', function (Blueprint $table) {
    $table->float('latitude', 18, 15);
    $table->float('longitude', 18, 15);
});

?>