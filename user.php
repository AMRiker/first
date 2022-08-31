<?php
class User
{
	public $login='';
	public $password='';
	public $confirm_password='';
	public $username='';
	public $age=0;
	public $sex='';
	public $invalid_psw_len='';
	public $low_age='';
	public $unconfirmed_psw='';
	//коснтруируем объект на основе класса, получаем все переменные
	public function __construct($login,$password,$confirm_password,$username,$age,$sex){
		$this->login = $login;
		$this->password = $password;
		$this->confirm_password = $confirm_password;
		$this->username = $username;
		$this->age = $age;
		$this->sex = $sex;
	}
	//объявим функцию для каждой проверки введенных данных
	//функция проверки возраста
	private function is_valid_age()
	{
		if ($this->age>=18){
			return true;
			}
		else{
			$this->low_age = 'you are too young';
			return false;
			}
	}

//функция проверки длины пароля
	private function is_valid_psw_lenth()
	{
		if (strlen($this->password) >= 3){
			return true;
			}
		else{
			$this->invalid_psw_len = 'your password too short';
			return false;
			}
	}


//функция совпадения пароля и его подтверждения
	private function is_valid_psw_conf()
	{
		if ($this->password == $this->confirm_password) {
			return true;
		}
		else {
			$this->uncofirmed_psw= 'your password is not confirmed';
			return false;
		}
	}

//объявим функцию проверки всех условий 
	public function valid_data()
	{
		if ($this->is_valid_age() and $this->is_valid_psw_lenth() and $this->is_valid_psw_conf()) {
			return true;
		} else {
			return false;
		}

	}
}
?>



