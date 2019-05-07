<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 02.05.2019
 * Time: 20:33
 */

namespace app\controllers;


use app\core\Route;
use app\models\Category;
use app\models\User;

class Add extends Controller
{
    public function action_index($options)
    {
        switch ($options){
            case 'index':
                $this->view->generate('AddPost.php', 'template_view.php');
                break;
            case 'createPost':
                Add::action_createPost();
                break;
            case 'category':
                $this->view->generate('AddCategory.php', 'template_view.php');
                break;
            case 'createCat':
                Add::action_createCat();
                break;
            default:
//                Route::ErrorPage404();
        }

    }

    public function action_createPost()
    {
        $id_user = intval($_COOKIE['id']);
        $userdata = User::findByID($id_user);
//        switch($userdata['access']){
//            case 'normal':
//                $this->view->generate('NormalUserView.php', 'template_view.php', $data);
//                break;
//            case 'moder':
//                $this->view->generate('ModerUserView.php', 'template_view.php', $data);
//                break;
//            default:
//                $this->view->generate('registration_view.php', 'template_view.php', $data);
//        }
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
    public function action_createCat(){
        $Category = new Category();
        $Category->setCatName($_POST['catName']);

        $LastCatId = $Category->insertCat();

        if ($LastCatId>0){
            $host = 'http://'.$_SERVER['HTTP_HOST'].'/'.'myblog/';
            header('Location:'.$host);
        }
    }
}