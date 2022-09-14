<?php

class Connect
{
    public function connectToBd()
    {
        $dbHost = "localhost";
        $dbUser = "root"; // Логин БД
        $dbPassword = "root"; // Пароль БД
        $dbBase = 'users1'; // Имя БД
        $dbTable = "user"; // Имя Таблицы БД
        try {
            // Подключение к базе данных, используем адрес БД (локальный в данном случае) логин и пароль от mysql,  того что в моем openserver
            // теперь я понял что $db - объект класса PDO!
            $db = new PDO("mysql:host=$dbHost;dbname=$dbBase", $dbUser, $dbPassword);
            // мы создали объект объект класса PDO под названием $db


            // Устанавливаем корректную кодировку (не знаю зачем скопировал из учебника как есть)
            $db->exec("set names utf8");
            $result = true;


        } catch (PDOException $e) {

            // Если есть ошибка соединения, выводим её, каюсь, грешен, что за функция getmessage особо не вдавался,
            //кроме того что она возвращает код ошибки

            print "Error " . $e->getMessage() . "<br/>";
        }

        if ($result) {
            return $db;}
        else {
            return NULL;
        }
    }
}