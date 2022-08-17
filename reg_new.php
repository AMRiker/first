<?php
function isAgeValid($age)
{
	if ($age < 18) {
		echo 'access denied';
		return false;
	} else {
		return true;
	}
}

function fill($user, $login, $username, $password, $confirmPassword, $age, $sex)
{
	$user->login = $login;
	$user->username = $username;
	$user->password = $password;
	$user->confirmPassword = $confirmPassword;
	$user->age = $age;
	$user->sex = $sex;

	return $user;
}

require __DIR__ . '/User.php';
$useOne = new User();
fill($useOne, $_POST["login"], $_POST["username"], $_POST["password"], $_POST["confirm_password"], $_POST["age"], $_POST["sex"]);
//$useOne = fill($useOne, $_POST["login"], $_POST["username"], $_POST["password"], $_POST["confirm_password"], $_POST["age"], $_POST["sex"]);

echo '<pre>';
var_dump($useOne);
var_dump(__DIR__);
echo '</pre>';


//второй комплект переменых

$userTwo = new User();

$login1 = $_POST["login1"];
$password1=$_POST["password1"];
$username1=$_POST["username1"];
$confirm_password1=$_POST["confirm_password1"];
$age1=$_POST["age1"];
$sex1=$_POST["sex1"];


// если я правильно понял что нужные переменные получили
// из формы регистрации свои значения в квадратных скобках


//теперь добавим проверку на возраст
isAgeValid($useOne->age);

//проверка длины пароля
if (strlen($useOne->password) < 3) {
	header('Location: short.php');
 	exit();
}

//проверка совпадения пароля
if ($password != $confirm_password) {
	header('Location: nonpsw.php');
 	exit();
}

//добавим проверку второго комплекта переменных

//теперь добавим проверку на возраст
isAgeValid($age1);

//проверка длины пароля
if (strlen($password1) < 3) {
	header('Location: short.php');
 	exit();
}

//проверка совпадения пароля
if ($password1 != $confirm_password1) {
	header('Location: nonpsw.php');
 	exit();
}

// Параметры для подключения
// инициализируем ряд переменных для подключения к базе sql
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
	echo 'your data sent in SQL database see your table';}

$users_data = array ('login' => $login, 'password' => $password, 'name' => $username, 'age' => $age, 'sex' => $sex);


//если я правильно понял то теперь у нас получился массив из данных пользователя, 
//где ключи это имя полей, а значения взяты из переменных формы
//теперь формируем запрос в базу

$query = $db->prepare ("INSERT INTO $db_table (login, password, name, age, sex) values (:login, :password, :name, :age, :sex)");

// Выполняем запрос с данными
$query->execute($users_data);


//формируем новый массив и новый запрос


$users_data = array ('login' => $login1, 'password' => $password1, 'name' => $username1, 'age' => $age1, 'sex' => $sex1);
$query = $db->prepare ("INSERT INTO $db_table (login, password, name, age, sex) values (:login, :password, :name, :age, :sex)");
$query->execute($users_data);


?>



