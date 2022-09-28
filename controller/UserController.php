<?php

namespace controller;
use model\User;

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
            $connect = new \Connect();
            $db = $connect->connectToBd();
            $user->wrToUsers1($db);
        }
        else {
            include __DIR__ . '/../view/regError.php';
        }
    }
    public function actionAuthorisation()
    {
        $user = new User();
        $user->login = $_POST["login"];
        $user->password=$_POST["password"];
        $connect = new \Connect();
        $db = $connect->connectToBd();
        $checkUser = $db -> prepare("SELECT * FROM user WHERE login=:login");
        $checkUser->bindParam("login", $user->login, \PDO::PARAM_STR);
        $checkUser->execute();
        $result = $checkUser->fetch(\PDO::FETCH_ASSOC);

        if ($user->password == $result['password']){
            include __DIR__ . '/../view/postForm.html';
            $_SESSION['userId'] = $result['id'];
        }
        else {
            print 'неправльный логин или пароль';
        }
    }

}
