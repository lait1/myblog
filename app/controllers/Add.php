<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 02.05.2019
 * Time: 20:33
 */

namespace app\controllers;


use app\models\User;

class Add extends Controller
{
    public function action_index()
    {
        $this->view->generate('addpost.php', 'template_view.php');
    }

    public function action_create()
    {
        $id_user = intval($_COOKIE['id']);
        $userdata = User::findByID($id_user);

        $Post = new \app\models\Post();
        $Post->setAutor($userdata['id_user']);
        $Post->setContent($_POST['content']);
        $Post->setTitle($_POST['title']);
        $Post->setDatePublic(date('Y-m-d H:i:s'));

        $LastPostId = $Post->insertPost();

        if ($LastPostId>0){
            $host = 'http://'.$_SERVER['HTTP_HOST'].'/'.'myblog/';
            header('Location:'.$host);
        }

    }
}