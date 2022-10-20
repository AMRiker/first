<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
    var_dump($class_name);
});
require_once __DIR__ . '\MigrationDbFirst.php';
$migration = new \migrations\MigrationDbFirst();
$migration->upPost();