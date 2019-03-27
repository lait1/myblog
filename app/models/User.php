<?php
namespace app\models;
use app\core\database;
use PDO;
/**
 * 
 */
class User extends Database
{
	const FIND_BY_LOGIN_STMT = "SELECT id_user FROM Users WHERE login = :login";
	const INSERT_STMT_2 = "INSERT INTO users SET user_name=:user_name, login=:login, password=:password, access=:access";
    const INSERT_STMT = "INSERT INTO Users (user_name, login, password, access) VALUES (:user_name, :login, :password, :access)";
    const UPDATE_STMT = "UPDATE Users SET password = :password WHERE id = :id";
    const DELETE_STMT = "DELETE FROM Users WHERE id = :id";

	protected $id_user;
	protected $user_name;
	protected $login;
	protected $password;
	protected $login_hash;
	protected $access;

	public function getId() {return $this->id; }
	public function getName() {return $this->user_name; }
    public function getLogin() {return $this->login; }
    public function getPassword() {return $this->password; }
    public function getHash() {return $this->login_hash; }
    public function getAccess() {return $this->access; }

	public function setId($id) {$this->id_user = $id;}
    public function setName($user_name) {$this->user_name = $user_name;}
    public function setLogin($login) {$this->login = $login;}
    public function setPassword($password) {$this->password = md5(md5(trim($password)));}
    public function setHash($login_hash) {$this->login_hash = $login_hash;}
    public function setAccess($access) {$this->access = $access;}

    public function insert() {
    	Database::openConnection(); 
        $stmt = self::$connection->prepare(self::INSERT_STMT_2);
        $stmt->bindParam(':user_name', $this->user_name, PDO::PARAM_STR);
        $stmt->bindParam(':login', $this->login, PDO::PARAM_STR);
        $stmt->bindParam(':password', $this->password, PDO::PARAM_STR);
        $stmt->bindParam(':access', $this->access, PDO::PARAM_INT);
        $stmt->execute();
        return $this->id_user = self::$connection->lastInsertId();
    }

	// public function __construct($date){
	// 	$this->id_user=$date['id_user'];
	// 	$this->login=$date['login'];
	// 	$this->password=$date['password'];
	// 	$this->login_hash=$date['login_hash'];
	// 	$this->user_name=$date['user_name'];
	// 	$this->access=$date['access'];
	// }

	// public function CreateUser(){
	// 	$err = [];

	//    // проверям логин
	//     if(!preg_match("/^[a-zA-Z0-9]+$/",$this->login))
	//     {
	//         $err[] = "Логин может состоять только из букв английского алфавита и цифр";
	//     }

	//     if(strlen($this->login) < 3 or strlen($this->login) > 30)
	//     {
	//         $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
	//     }

	//     // проверяем, не сущестует ли пользователя с таким именем
	//     $query = Database::getRow("SELECT id_user FROM users WHERE login=$this->login");

	//     if($query > 0)
	//     {
	//         $err[] = "Пользователь с таким логином уже существует в базе данных";
	//     }

	//     // Если нет ошибок, то добавляем в БД нового пользователя
	//     if(count($err) == 0)
	//     {
	//         $login = $this->login;
	//         $password = md5(md5(trim($this->password)));
	//         $add_row = Database::add("INSERT INTO user SET user_name='$this->user_name', user_login='$login', user_password='$password', access='$this->access'");
	//         return $add_row;
	//     }
	//     else
	//     {
	//         return $err;
	//     }
	// }

	// public static function getAllUsers() {
	//        $AllUsers = [];
	//        $UserArray = Database::getAll("SELECT * FROM users");
	//        foreach ($UserArray as $UserData) {
	//            $User[] = new User($UserData);
	//        }
	//        return $User;
	//    }
    public static function load(array $resultset) {
        $instance = new static;
        foreach ($resultset as $key => $value) {
            if (property_exists($instance, $key)) {
                $instance->$key = $value;
            }
        }
        return $instance;
    }



}