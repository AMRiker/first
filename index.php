<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
    var_dump($class_name);
});
session_start();
if ($_SERVER ['REQUEST_URI'] == '/'){
    require_once __DIR__ . '/view/startPage.html';
}
if ($_SERVER ['REQUEST_URI'] == '/index.php/registration'){
        $controller = new \controller\UserController();
        $controller->actionRegistration();
}
if ($_SERVER ['REQUEST_URI'] == '/index.php/enter'){
    $controller = new \controller\UserController();
    $controller->actionAuthorisation();

}
if ($_SERVER ['REQUEST_URI'] == '/index.php/writePost') {
    $controller = new \controller\PostController();
    $controller->actionWritePost();
}