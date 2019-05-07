<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 02.05.2019
 * Time: 19:57
 */

namespace app\controllers;


use app\core\Route;

class Post extends Controller
{
    public function action_index($options)
    {
        $data = \app\models\Post::FindById($options);

        if(!empty($data)){
            $this->view->generate('SinglePost.php','template_view.php', $data);
        }
        else
        {
            Route::ErrorPage404();
        }
//

    }
}