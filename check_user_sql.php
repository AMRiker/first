<?php
$login = $_POST["login"];
$password=$_POST["password"];

$dbHost = "localhost";
$dbUser = "root"; // Логин БД
$dbPassword = "root"; // Пароль БД
$dbBase = 'users1'; // Имя БД
$dbTable = "user"; // Имя Таблицы БД

try {
	$db = new PDO("mysql:host=$dbHost;dbname=$dbBase", $dbUser, $dbPassword);
	$db->exec("set names utf8");
	$result  = true;
}

catch (PDOException $e) {
	print "Error " . $e->getMessage() . "<br/>";
}

if ($result) { 
	echo 'подключение удалось';
}
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
