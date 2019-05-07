<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 07.05.2019
 * Time: 12:13
 */

namespace app\models;


use app\core\Database;
use PDO;

class Category extends Database
{
    const GET_ALL_CAT = "SELECT * FROM category";

    const INSERT_CAT = "INSERT INTO category(CatName) value (:catName)";

    protected $id;
    protected $catName;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCatName()
    {
        return $this->catName;
    }

    /**
     * @param mixed $catName
     */
    public function setCatName($catName)
    {
        $this->catName = $catName;
    }

    public static function GetAllCat()
    {
        database::openConnection();
        $stmt=self::$connection->prepare(self::INSERT_CAT);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    public function insertCat()
    {
        database::openConnection();
        $stmt = self::$connection->prepare(self::INSERT_CAT);
        $stmt->bindParam(':catName', $this->catName, PDO::FETCH_ASSOC);
        $stmt->execute();
        return $this->id = self::$connection->lastInsertId();
    }

}