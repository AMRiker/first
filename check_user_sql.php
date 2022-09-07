<?php
require_once  __DIR__ . '/Connect.php';
$login = $_POST["login"];
$password=$_POST["password"];
$connect = new Connect();
$db = $connect->connectToBd();
$checkUser = $db -> prepare("SELECT * FROM user WHERE login=:login");
$checkUser->bindParam("login", $login, PDO::PARAM_STR);
$checkUser->execute();
$result = $checkUser->fetch(PDO::FETCH_ASSOC);

echo '<pre>';
var_dump($result);
echo '</pre>';
if ($password == $result['password']){
	print 'Поздравляю вы прошли авторизацию';
}


//session_start();
//include('config.php');
////if (isset($_POST['login'])) {
////    $username = $_POST['username'];
////    $password = $_POST['password'];
////    $checkUser = $connection->prepare("SELECT * FROM users WHERE username=:username");
////    $checkUser->bindParam("username", $username, PDO::PARAM_STR);
//    $checkUser->execute();
//    $result = $checkUser->fetch(PDO::FETCH_ASSOC);
//    if (!$result) {
//        echo '<p class="error">Неверные пароль или имя пользователя!</p>';
//    } else {
//        if (password_verify($password, $result['password'])) {
//            $_SESSION['user_id'] = $result['id'];
//            echo '<p class="success">Поздравляем, вы прошли авторизацию!</p>';
//        } else {
//            echo '<p class="error"> Неверные пароль или имя пользователя!</p>';
//        }
//    }
//}
?>
