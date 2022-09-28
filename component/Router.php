<?php
namespace component;

use controller\UserController;
use controller\PostController;

class Router
{
    public function run()
    {
        if ($_SERVER ['REQUEST_URI'] == '/'){
            require_once __DIR__ . '/../view/startPage.php';
        }
        if ($_SERVER ['REQUEST_URI'] == '/index.php/registration'){
            $controller = new UserController();
            $controller->actionRegistration();
        }
        if ($_SERVER ['REQUEST_URI'] == '/index.php/enter'){
            $controller = new UserController();
            $controller->actionAuthorisation();

        }
        if ($_SERVER ['REQUEST_URI'] == '/index.php/writePost') {
            $controller = new PostController();
            $controller->actionWritePost();
        }
    }
}