<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 12.05.2019
 * Time: 18:48
 */

namespace app\controllers;
use app\core\Route;

class Category extends Controller
{
    public function action_index($options)
    {
        $data['post']=\app\models\Category::GetAllPostFromCat($options);
        $data['allCategory']=\app\models\Category::GetAllCat();
        $i=0;
        foreach($data['post'] as $dataId){
            $data['post'][$i]['category']=\app\models\Category::GetAllCatFromPost($dataId['id']);
            $i++;
        }

        if(!empty($data)){
            $this->view->generate('AllPost_view.php','template_view.php', $data);
        }
        else
        {
            Route::ErrorPage404();
        }
    }

}