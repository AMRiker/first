<?php

namespace controller;

class UserController
{
    public function actionRegistration()
    {
        require_once  __DIR__ . '/../model/User.php';
        require_once  __DIR__ . '/../model/Connect.php';
        $user = new \User();
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
        require_once  __DIR__ . '/../model/Connect.php';
        require_once  __DIR__ . '/../model/User.php';
        $user = new \User();
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
        }
        else {
            print 'неправльный логин или пароль';
        }
    }
    public function actionWritePost()
    {
        require_once  __DIR__ . '/../model/Connect.php';
        require_once  __DIR__ . '/../model/User.php';
        $head = $_POST['head'];
        $body = $_POST['body'];
        $user = new \User();
        $connect = new \Connect();
        $db = $connect->connectToBd();
        $postData = [
            'user_id'=> 17,
            'head'=> $head,
            'body'=> $body
        ];
        $writePost = $db -> prepare ("INSERT INTO post (user_id, head, body) values (:user_id, :head, :body)");
        $writePost->execute($postData);
    }
}