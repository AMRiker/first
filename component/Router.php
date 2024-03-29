<?php
namespace component;

use controller\UserController;
use controller\PostController;

class Router
{
    public static function run()
    {
        switch ($_SERVER['REQUEST_URI']){
            case "/":
            require_once __DIR__ . '/../view/startPage.php';
            break;
            case '/index.php/registration':
            $controller = new UserController();
            $controller->actionRegistration();
            break;
            case '/index.php/enter':
            $controller = new UserController();
            $controller->actionAuthorisation();
            break;
            case '/index.php/writePost':
            $controller = new PostController();
            $controller->actionWritePost();
            break;
            case '/index.php/ShowForm':
                $controller = new PostController();
                $controller->actionShow();
                break;
            case '/index.php/getPosts':
                PostController::getAllPosts();
                break;
        }
    }
}