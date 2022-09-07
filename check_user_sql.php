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
?>
