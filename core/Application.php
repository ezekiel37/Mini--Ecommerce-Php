<?php

namespace app\core;

class Application
{
    public static Application $app;
    public Request $request; 
    public Router $router;
    public function __construct()
    {
        self::$app = $this;
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
       $this->router->resolve();
    }
}