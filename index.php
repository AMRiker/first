<?php
if ($_SERVER ['REQUEST_URI'] == '/'){
    require_once __DIR__ . '/view/startPage.html';
}
echo '<pre>';
var_dump($_SERVER['REQUEST_URI']);
echo '<pre>';
if ($_SERVER ['REQUEST_URI'] == '/index.php/registration'){
        require_once __DIR__ . '/controller/userController.php';
        $controller = new \controller\UserController();
        $controller->actionRegistration();
}
if ($_SERVER ['REQUEST_URI'] == '/index.php/enter'){
    require_once __DIR__ . '/check_user_sql.php';
}