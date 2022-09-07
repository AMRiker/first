<?php
class User
{
	public $login='';
	public $password='';
	public $confirmPassword='';
	public $username='';
	public $age=0;
	public $sex='';
	public $invalidPswlen='';
	public $lowAge='';
	public $unconfirmedPsw='';
	//коснтруируем объект на основе класса, получаем все переменные
	public function __construct($login, $password, $confirmPassword, $username, $age, $sex){
		$this->login = $login;
		$this->password = $password;
		$this->confirmPassword = $confirmPassword;
		$this->username = $username;
		$this->age = $age;
		$this->sex = $sex;
	}
	//объявим функцию для каждой проверки введенных данных
	//функция проверки возраста
	private function isValidAge()
	{
		if ($this->age>=18){
			return true;
			}
		else{
			$this->lowAge = 'you are too young';
			return false;
			}
	}

//функция проверки длины пароля
	private function isValidPswLenth()
	{
		if (strlen($this->password) >= 3){
			return true;
			}
		else{
			$this->invalidPswlen = 'your password too short';
			return false;
			}
	}


//функция совпадения пароля и его подтверждения
	private function isValidPswConf()
	{
		if ($this->password == $this->confirmPassword) {
			return true;
		}
		else {
			$this->uncofirmedPsw= 'your password is not confirmed';
			return false;
		}
	}

//объявим функцию проверки всех условий 
	public function validData()
	{
		if ($this->isValidAge() and $this->isValidPswLenth() and $this->isValidPswConf()) {
			return true;
		} else {
			return false;
		}

	}
}
?>



