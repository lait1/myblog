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
    public static function load(array $resultset)
    {
        $instance = new static;

        foreach ($resultset as $key => $value) {
//            foreach ($value as $keys => $values) {
                if (property_exists($instance, $key)) {
                    $instance->$key = $value;
                }
//            }

        }
        return $instance;
    }
}