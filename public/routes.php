<?php

// define routes

$routes = array(
    array(
        "pattern" => "login",
        "controller" => "main",
        "action" => "login"
    ),
    array(
        "pattern" => "home",
        "controller" => "home",
        "action" => "index"
    )
);

// add defined routes
foreach ($routes as $route) {
    $router->addRoute(new Framework\Router\Route\Simple($route));
}

// unset globals
unset($routes);
