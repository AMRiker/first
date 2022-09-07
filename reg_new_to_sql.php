<?php
require_once  __DIR__ . '/User.php';
require_once  __DIR__ . '/Connect.php';
//создаем ноывый объект типа user
$user = new User ($_POST["login"],$_POST["password"],$_POST["confirm_password"],
	$_POST["username"],$_POST["age"],$_POST["sex"]);

	// если я правильно понял что нужные переменные получили
	// из формы регистрации свои значения в квадратных скобках и сразу попали в класс
	//echo '<pre>';
	//var_dump($user);
	//echo '</pre>';


function wrToUsers1($user, $db)
{

	// Параметры для подключения
	// инициализируем ряд переменных для подключения к базе sql
	$usersData = [
		'login' => $user->login,
		'password' => $user->password,
		'name' => $user->username,
		'age' => $user->age,
		'sex' => $user->sex
	];

	echo '<pre>';
	var_dump($usersData);
	echo '</pre>';

	//если я правильно понял то теперь у нас получился массив из данных пользователя,
	//где ключи это имя полей, а значения взяты из переменных формы
	//теперь формируем запрос в базу

	$query = $db->prepare ("INSERT INTO user (login, password, name, age, sex) values (:login, :password, :name, :age, :sex)");

	// Выполняем запрос с данными
	$query->execute($usersData);

}

if ($user->validData()) {
	$connect = new Connect();
	$db = $connect->connectToBd();
	wrToUsers1($user, $db);
}
else {
	include __DIR__ . '/reg_error.php';
}
?>


