<?php

namespace App\core;

class Application
{


    public Router $router;

    public array $routes = [];

    public function __construct()
    {

        $this->router = new Router();
        $config = require 'source/config.php';
        $this->routes = $config['routes'];
        $this->router->define($this->routes);
    }
}