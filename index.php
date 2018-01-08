<?php

require 'vendor/autoload.php';

use App\Core\{Router, Request};

$router = new Router;

//require 'routes.php';

require Router::load('app/routes.php')
    ->direct(Request::uri(), Request::method());