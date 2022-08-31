<?php
$login = $_POST["login"];
$password=$_POST["password"];

$db_host = "localhost"; 
$db_user = "root"; // Логин БД
$db_password = "root"; // Пароль БД
$db_base = 'users1'; // Имя БД
$db_table = "user"; // Имя Таблицы БД

try {$db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
     $db->exec("set names utf8");
}

catch (PDOException $e) {print "Error " . $e->getMessage() . "<br/>";
}

$user_search = "SELECT FROM 'user' WHERE 'login' = '$login' AND 'password' = '$password'"
$find_user = NULL;
$find_user = $db-> query($user_search);
?>