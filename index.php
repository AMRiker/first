<?php
if ($_SERVER ['REQUEST_URI'] == '/'){
    require_once __DIR__ . '/view/startPage.html';
}
if ($_SERVER ['REQUEST_URI'] == '/index.php/registration'){
        require_once __DIR__ . '/controller/userController.php';
        $controller = new \controller\UserController();
        $controller->actionRegistration();
}
if ($_SERVER ['REQUEST_URI'] == '/index.php/enter'){
    require_once __DIR__ . '/controller/userController.php';
    $controller = new \controller\UserController();
    $controller->actionAuthorisation();

}
if ($_SERVER ['REQUEST_URI'] == '/index.php/writePost') {
    require_once __DIR__ . '/controller/userController.php';
    $controller = new \controller\UserController();
    $controller->actionWritePost();
}