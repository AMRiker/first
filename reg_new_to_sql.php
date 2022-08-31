<?php
require __DIR__ . '/User.php';
//создаем ноывый объект типа user
$user = new User ($_POST["login"],$_POST["password"],$_POST["confirm_password"],
	$_POST["username"],$_POST["age"],$_POST["sex"]);

// если я правильно понял что нужные переменные получили
// из формы регистрации свои значения в квадратных скобках и сразу попали в класс
echo '<pre>';
var_dump($user);
echo '</pre>';


//создаем функцию подключения и записи в БД
function connectToBd()
{
	$dbHost = "localhost";
	$dbUser = "root"; // Логин БД
	$dbPassword = "root"; // Пароль БД
	$dbBase = 'users1'; // Имя БД
	$dbTable = "user"; // Имя Таблицы БД
	try {
		// Подключение к базе данных, используем адрес БД (локальный в данном случае) логин и пароль от mysql,  того что в моем openserver
		$db = new PDO("mysql:host=$dbHost;dbname=$dbBase", $dbUser, $dbPassword);


		// Устанавливаем корректную кодировку (не знаю зачем скопировал из учебника как есть)
		$db->exec("set names utf8");
		$result = true;


	} catch (PDOException $e) {

		// Если есть ошибка соединения, выводим её, каюсь, грешен, что за функция getmessage особо не вдавался,
		//кроме того что она возвращает код ошибки

		print "Error " . $e->getMessage() . "<br/>";
	}

	if ($result) {
		echo 'your data sent in SQL database see your table';
		return $db;}
	else {
		return NULL;
	}
}
//создаем функцию для внесения данных учетной записи в таблицу

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

if ($user->valid_data()){
	$db = connectToBd();
	wrToUsers1($user, $db);
}
else{
	header('Location reg_error.php' );
}
?>


