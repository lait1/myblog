<?php
namespace app\controllers;
use app\core\database;

/**
 * 
 */
class User 
{
	
	public $id_user;
	public $login;
	public $password;
	public $login_hash;
	public $user_name;
	public $access;

	public function __construct($date){
		$this->id_user=$date['id_user'];
		$this->login=$date['login'];
		$this->password=$date['password'];
		$this->login_hash=$date['login_hash'];
		$this->user_name=$date['user_name'];
		$this->access=$date['access'];
	}

	public function CreateUser(){
		$err = [];

	   // проверям логин
	    if(!preg_match("/^[a-zA-Z0-9]+$/",$this->login))
	    {
	        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
	    }

	    if(strlen($this->login) < 3 or strlen($this->login) > 30)
	    {
	        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
	    }

	    // проверяем, не сущестует ли пользователя с таким именем
	    $query = Database::getRow("SELECT id_user FROM users WHERE login=$this->login");

	    if($query > 0)
	    {
	        $err[] = "Пользователь с таким логином уже существует в базе данных";
	    }

	    // Если нет ошибок, то добавляем в БД нового пользователя
	    if(count($err) == 0)
	    {
	        $login = $this->login;
	        $password = md5(md5(trim($this->password)));
	        $add_row = Database::add("INSERT INTO user SET user_name='$this->user_name', user_login='$login', user_password='$password', access='$this->access'");
	        return $add_row;
	    }
	    else
	    {
	        return $err;
	    }
	}
	public static function getAllUsers() {
        $track = [];
        $trackArray = Database::getAll("SELECT * FROM users");
        foreach ($trackArray as $trackData) {
            $track[] = new User($trackData);
        }
        return $track;
    }



}