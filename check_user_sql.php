<?php
require_once  __DIR__ . '/Connect.php';
require_once  __DIR__ . '/User.php';
$user = new User();
$user->login = $_POST["login"];
$user->password=$_POST["password"];
$connect = new Connect();
$db = $connect->connectToBd();
$checkUser = $db -> prepare("SELECT * FROM user WHERE login=:login");
$checkUser->bindParam("login", $user->login, PDO::PARAM_STR);
$checkUser->execute();
$result = $checkUser->fetch(PDO::FETCH_ASSOC);

echo '<pre>';
var_dump($result);
echo '</pre>';
if ($user->password == $result['password']){
	print 'Поздравляю вы прошли авторизацию';
}
?>
