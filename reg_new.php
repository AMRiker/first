<?php
$login='';
$password='';
$username='';
$age=0;
$sex='';
//объявили переменные согласно типов вводимых данных
$login = $_POST["login"];
$password=$_POST["password"];
$username=$_POST["username"];
$confirm_password=$_POST["confirm_password"];
$age=$_POST["age"];
$sex=$_POST["sex"];
// если я правильно понял что нужные переменные получили
// из формы регистрации свои значения в квадратных скобках


//теперь добавим проверку на возраст
if ($age < 18) {
	echo 'access denied';
 	exit();}
//проверка длины пароля
if (strlen($password) < 3) {
	header('Location: short.php');
 	exit();}

//проверка совпадения пароля
if ($password != $confirm_password) {
	header('Location: nonpsw.php');
 	exit();}

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

?>

изучить документацию на try, cath, PDO.

