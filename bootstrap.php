<?php

require __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$capsule = new Capsule;

$capsule->addConnection([

   "driver" => getenv('DB_DRIVER'),
   "host" => getenv('DB_HOST'),
   "database" => getenv('DB_DATABASE'),
   "username" => getenv('DB_USERNAME'),
   "password" => getenv('DB_PASSWORD')

]);

//Make this Capsule instance available globally.
$capsule->setAsGlobal();

// Setup the Eloquent ORM.
$capsule->bootEloquent();

?>