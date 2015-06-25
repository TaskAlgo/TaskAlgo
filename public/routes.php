<?php

// define routes

$routes = array(
    array(
        "pattern" => "login",
        "controller" => "users",
        "action" => "login"
    ),
    array(
        "pattern" => "about",
        "controller" => "home",
        "action" => "about"
    ),
    array(
        "pattern" => "terms",
        "controller" => "home",
        "action" => "terms"
    ),
    array(
        "pattern" => "privacy",
        "controller" => "home",
        "action" => "privacy"
    ),
    array(
        "pattern" => "contact",
        "controller" => "home",
        "action" => "contact"
    ),
    array(
        "pattern" => "faq",
        "controller" => "home",
        "action" => "faq"
    ),
    array(
        "pattern" => "bookService",
        "controller" => "users",
        "action" => "bookService"
    )
);

// add defined routes
foreach ($routes as $route) {
    $router->addRoute(new Framework\Router\Route\Simple($route));
}

// unset globals
unset($routes);
