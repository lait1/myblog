<?php

namespace app\controllers;

use app\models\Category;
use app\models\User;

class Main extends Controller
{


    public function action_index($options)
    {
        $access=User::AccessCheck();


//        if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {
//            $id_user = intval($_COOKIE['id']);
//            $userData = User::findByID($id_user);
//
//            if (($userData['user_hash'] !== $_COOKIE['hash']) or ($userData['id_user'] !== $_COOKIE['id'])) {
//                echo "Хм, что-то не получилось";
//            } else {
//                $data['allCategory']=Category::GetAllCat();
//                $data['post'] = \app\models\Post::GetAllPost();
//                $i=0;
//                foreach($data['post'] as $dataId){
//                    $data['post'][$i]['category']=Category::GetAllCatFromPost($dataId['id']);
//                    $i++;
//                }
//                $this->view->generate('AllPost_view.php', 'template_view.php', $data);
//            }
//        } else {
//            $this->view->generate('main_view.php', 'template_view.php');
//        }
//
         switch($access){
            case 1:
                $data['allCategory']=Category::GetAllCat();
                $data['post'] = \app\models\Post::GetAllPost();
                $i=0;
                foreach($data['post'] as $dataId){
                    $data['post'][$i]['category']=Category::GetAllCatFromPost($dataId['id']);
                    $i++;
                }
                $this->view->generate('AllPost_view.php', 'template_view.php', $data);
                break;
            case 'moder':
                $this->view->generate('ModerUserView.php', 'template_view.php', $data);
                break;
            default:
                $this->view->generate('main_view.php', 'template_view.php');
        }





    }


}