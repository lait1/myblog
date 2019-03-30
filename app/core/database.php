<?php
namespace app\core;
use PDO;
class Database
{
    /**
     * @var PDO
     */
	protected static $connection;

	public static function openConnection() { 

      self::$connection = new PDO("mysql:host=localhost; dbname=blog;charset=UTF8", "root", "", array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'" ));
	}

	// public static function getAll($sql, $params= array()) {
	//  Database::openConnection(); 

 //    $stmt = self::$connection->prepare($sql); 
 //    $stmt->execute($params); 

 //     return $stmt->fetchAll(PDO::FETCH_ASSOC); 
 //    } 
 //  public static function getRow($sql, $params= array()) { 
 //    Database::openConnection(); 

 //    $stmt = self::$connection->prepare($sql); 
 //    $stmt->execute($params); 

 //     return $stmt->fetch(PDO::FETCH_ASSOC); 
 //    } 

 //    public static function add($sql, $params= array()) { 
	//  Database::openConnection(); 

 //    $stmt = self::$connection->prepare($sql);
     
 //    return $stmt->execute($params); 
 //    } 

}