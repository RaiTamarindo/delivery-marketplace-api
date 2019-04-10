<?php

namespace JumpApp\Router;

use \Slim\App;

interface IRouter {

    public function apply(App $app);

}

?>