<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 01.05.2019
 * Time: 18:00
 */

namespace app\models;


use app\core\Database;
use PDO;

class Post extends Database
{
    const GET_ALL_POST = "SELECT id, title, content, date_public, user_name FROM post inner join users where autor=id_user";
    const FIND_BY_ID = "SELECT id, title, content, date_public, user_name FROM post inner join users where autor=id_user and id= :id";

    const INSERT_POST = "insert into post (autor, title, content, date_public) values (:autor, :title, :content, :date_public)";
    const DELETE_POST = "DELETE FROM post WHERE id=:id";

    protected $id;
    protected $autor;
    protected $title;
    protected $content;
    protected $date_public;

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
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * @param mixed $autor
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getDatePublic()
    {
        return $this->date_public;
    }

    /**
     * @param mixed $date_public
     */
    public function setDatePublic($date_public)
    {
        $this->date_public = $date_public;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function insertPost()
    {
        database::openConnection();
        $stmt = self::$connection->prepare(self::INSERT_POST);
        $stmt->bindParam(':autor', $this->autor, PDO::PARAM_STR);
        $stmt->bindParam(':title', $this->title, PDO::PARAM_STR);
        $stmt->bindParam(':content', $this->content, PDO::PARAM_STR);
        $stmt->bindParam(':date_public', $this->date_public, PDO::PARAM_INT);
        $stmt->execute();
        return $this->id = self::$connection->lastInsertId();
    }
    public function deletePost($id)
    {
        database::openConnection();
        $stmt = self::$connection->prepare(self::INSERT_POST);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function GetAllPost()
    {
        database::openConnection();
        $stmt = self::$connection->prepare(self::GET_ALL_POST);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
//        return $row ? self::load($row) : null;
    }

    public static function FindById($id)
    {
        database::openConnection();
        $stmt=self::$connection->prepare(self::FIND_BY_ID);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }


}