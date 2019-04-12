<?php

namespace JampApp\Router;

use \Slim\App;

interface IRouter {

    public function apply(App $app);

}

?>