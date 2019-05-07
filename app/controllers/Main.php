<?php

namespace app\controllers;

use app\models\User;

class Main extends Controller
{


    public function action_index($options)
    {

        if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {
            $id_user = intval($_COOKIE['id']);
            $userdata = User::findByID($id_user);

            if (($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['id_user'] !== $_COOKIE['id'])) {
                echo "Хм, что-то не получилось";
            } else {

//                $data = "Привет, " . $userdata['user_name'] . ". Всё работает!";
                $data = \app\models\Post::GetAllPost();
//         switch($userdata['access']){
//            case 'normal':
//                $this->view->generate('NormalUserView.php', 'template_view.php', $data);
//                break;
//            case 'moder':
//                $this->view->generate('ModerUserView.php', 'template_view.php', $data);
//                break;
//            default:
//                $this->view->generate('registration_view.php', 'template_view.php', $data);
//        }
                $this->view->generate('AllPost_view.php', 'template_view.php', $data);
            }

        } else {
            $this->view->generate('main_view.php', 'template_view.php');
        }


    }


}