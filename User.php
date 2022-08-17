<?php
class User
{
    public $login;
    public $username;
    public $age;
    public $password;
    public $confirmPassword;
    public $sex;

    public function __construct($login, $username, $password, $confirmPassword, $age, $sex)
    {
        $this->login = $login;
        $this->username = $username;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
        $this->age = $age;
        $this->sex = $sex;
    }
}