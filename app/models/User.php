<?php

namespace app\models;

use app\core\database;
use PDO;

/**
 *
 */
class User extends Database
{
    const FIND_BY_LOGIN = "SELECT * FROM Users WHERE login = :login";
    const FIND_BY_USER_ID = "SELECT * FROM Users WHERE id_user = :id";

    const INSERT_STMT = "INSERT INTO Users (user_name, login, password, access) VALUES (:user_name, :login, :password, :access)";
    const UPDATE_HASH = "UPDATE Users SET user_hash = :user_hash WHERE id_user = :id";
    const DELETE_STMT = "DELETE FROM Users WHERE id = :id";

    protected $id_user;
    protected $user_name;
    protected $login;
    protected $password;
    protected $user_hash;
    protected $access;

    public function getId()
    {
        return $this->id_user;
    }

    public function getName()
    {
        return $this->user_name;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getHash()
    {
        return $this->user_hash;
    }

    public function getAccess()
    {
        return $this->access;
    }

    public function setId($id)
    {
        $this->id_user = $id;
    }

    public function setName($user_name)
    {
        $this->user_name = $user_name;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setPassword($password)
    {
        $this->password = md5(md5(trim($password)));
    }

    public function setHash($user_hash)
    {
        $this->user_hash = $user_hash;
    }

    public function setAccess($access)
    {
        $this->access = $access;
    }

    public function insert()
    {
        Database::openConnection();
        $stmt = self::$connection->prepare(self::INSERT_STMT);
        $stmt->bindParam(':user_name', $this->user_name, PDO::PARAM_STR);
        $stmt->bindParam(':login', $this->login, PDO::PARAM_STR);
        $stmt->bindParam(':password', $this->password, PDO::PARAM_STR);
        $stmt->bindParam(':access', $this->access, PDO::PARAM_INT);
        $stmt->execute();
        return $this->id_user = self::$connection->lastInsertId();
    }

    public function updateHash()
    {
        Database::openConnection();
        $stmt = self::$connection->prepare(self::UPDATE_HASH);
        $stmt->bindParam(':id', $this->id_user, PDO::PARAM_INT);
        $stmt->bindParam(':user_hash', $this->user_hash, PDO::PARAM_STR);
        $stmt->execute();
    }

    public static function findByID($id_user)
    {
        Database::openConnection();
        $stmt = self::$connection->prepare(self::FIND_BY_USER_ID);
        $stmt->bindParam(':id', $id_user, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public static function findByLogin($login)
    {
        Database::openConnection();
        $stmt = self::$connection->prepare(self::FIND_BY_LOGIN);
        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public static function generateCode($length = 6)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
        $code = "";
        $clen = strlen($chars) - 1;
        while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0, $clen)];
        }
        return $code;
    }
    public static function AccessCheck(){
        if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {
            $id_user = intval($_COOKIE['id']);
            $userData = self::findByID($id_user);
            if (($userData['user_hash'] !== $_COOKIE['hash']) or ($userData['id_user'] !== $_COOKIE['id'])) {
               return false;
            } else {
                return $userData;
            }
        }
    }
    // public function __construct($date){
    // 	$this->id_user=$date['id_user'];
    // 	$this->login=$date['login'];
    // 	$this->password=$date['password'];
    // 	$this->user_hash=$date['user_hash'];
    // 	$this->user_name=$date['user_name'];
    // 	$this->access=$date['access'];
    // }



}