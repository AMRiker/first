<?php
namespace migrations;
use model\Connect;

class MigrationDbFirst
{
    public function upUser()
    {
        $connect = new Connect();
        $db = $connect->connectToBd();
        $query = $db->prepare
            ("CREATE TABLE `user` (
            `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
            `login` VARCHAR(52) NOT NULL,
            `password` VARCHAR (52) NOT NULL,
            `name` VARCHAR (52) NOT NULL,
            `age` INT NOT NULL,
            `sex` VARCHAR (52) NOT NULL    
            )");
        $query-> execute();
    }
    public function upPost()
    {
        $connect = new Connect();
        $db = $connect->connectToBd();
        $query = $db-> prepare
            ("CREATE TABLE `post` (
            `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
            `user_id` INT NOT NULL,
            `head` VARCHAR (52) NOT NULL,
            `body` TEXT)");
        $query-> execute();
        $query = $db-> prepare
        ("ALTER TABLE post ADD FOREIGN KEY (user_id) REFERENCES user(id)");
        $query-> execute();
    }
}
