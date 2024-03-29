<?php

namespace controller;
use model\User;
use model\Connect;

class UserController
{
    public function actionRegistration()
    {
        $user = new User();
        $user-> fill(
            $_POST["login"],
            $_POST["password"],
            $_POST["confirm_password"],
            $_POST["username"],
            $_POST["age"],
            $_POST["sex"]
        );

        if ($user->validData()) {
            $connect = new Connect();
            $db = $connect->connectToBd();
            $user->wrToUsers1($db);
        }
        else {
            require_once('/../view/regError.php');
        }
    }
    public function actionAuthorisation()
    {
        $user = new User();
        $user->login = $_POST["login"];
        $user->password=$_POST["password"];
        $connect = new Connect();
        $db = $connect->connectToBd();
        $checkUser = $db -> prepare("SELECT * FROM user WHERE login=:login");
        $checkUser->bindParam("login", $user->login, \PDO::PARAM_STR);
        $checkUser->execute();
        $result = $checkUser->fetch(\PDO::FETCH_ASSOC);

        if (password_verify($user->login.$user->password, $result['password'])){
            include __DIR__ . '/../view/postForm.php';
            $_SESSION['userId'] = $result['id'];
        }
        else {
            print 'неправльный логин или пароль';
        }
    }

}
