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
    const INSERT_CAT_POST = "INSERT INTO cat_post(cat_id, post_id) value (:cat_id, :post_id)";
    
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
        $stmt=self::$connection->prepare(self::GET_ALL_CAT);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    public function insertCat()
    {
        database::openConnection();
        $stmt = self::$connection->prepare(self::INSERT_CAT);
        $stmt->bindParam(':catName', $this->catName, PDO::PARAM_STR);
        $stmt->execute();
        return $this->id = self::$connection->lastInsertId();
    }

    public static function insertCatPost($cat, $post)
    {
        database::openConnection();
        $stmt=self::$connection->prepare(self::INSERT_CAT_POST);
        $stmt->bindParam(':cat_id', $cat, PDO::PARAM_STR);
        $stmt->bindParam(':post_id', $post, PDO::PARAM_STR);    
        $stmt->execute();
    }
}