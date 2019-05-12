<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 02.05.2019
 * Time: 19:57
 */

namespace app\controllers;


use app\core\Route;
use app\models\category;

class Post extends Controller
{
    public function action_index($options)
    {
        $data = \app\models\Post::FindById($options);
        $data['category']=Category::GetAllCatFromPost($options);

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