<?php
require __DIR__ . '/User.php';
//создаем ноывый объект типа user
$New_user = new User ($_POST["login"],$_POST["password"],$_POST["confirm_password"],
	$_POST["username"],$_POST["age"],$_POST["sex"]);

// если я правильно понял что нужные переменные получили
// из формы регистрации свои значения в квадратных скобках и сразу попали в класс
echo '<pre>';
var_dump($New_user);
echo '</pre>';


//создаем функцию подключения и записи в БД
function connect_to_bd(){
	$db_host = "localhost";
	$db_user = "root"; // Логин БД
	$db_password = "root"; // Пароль БД
	$db_base = 'users1'; // Имя БД
	$db_table = "user"; // Имя Таблицы БД
	try {
		// Подключение к базе данных, используем адрес БД (локальный в данном случае) логин и пароль от mysql,  того что в моем openserver
		$db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);


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

function wr_to_users1($New_user, $db)
{

// Параметры для подключения
// инициализируем ряд переменных для подключения к базе sql
	$users_data = array ('login' => $New_user->login, 'password' => $New_user->password,
		'name' => $New_user->username, 'age' => $New_user->age, 'sex' => $New_user->sex);

	echo '<pre>';
var_dump($users_data);
	echo '</pre>';

//если я правильно понял то теперь у нас получился массив из данных пользователя,
//где ключи это имя полей, а значения взяты из переменных формы
//теперь формируем запрос в базу

	$query = $db->prepare ("INSERT INTO user (login, password, name, age, sex) values (:login, :password, :name, :age, :sex)");

// Выполняем запрос с данными
	$query->execute($users_data);

}

if ($New_user->valid_data()){
	$db = connect_to_bd();
	wr_to_users1($New_user, $db);
}
else{
	header('Location reg_error.php' );
}
?>


