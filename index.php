<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
    var_dump($class_name);
});
session_start();
$router = new \component\Router();
$router->run();
