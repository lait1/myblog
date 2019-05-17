<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 12.05.2019
 * Time: 18:48
 */

namespace app\controllers;
use app\core\Route;
use \app\models\Category as CategoryModel;
class Category extends Controller
{
    public function action_index($options)
    {
//        if($options=='test'){
//            $data['allCategory']=CategoryModel::GetAllCat();
//            header('Content-Type: application/json');
//            echo json_encode($data['allCategory']);
//        }
        $data['post']=CategoryModel::GetAllPostFromCat($options);
        $data['allCategory']=CategoryModel::GetAllCat();
        $data['catTitle'] = CategoryModel::FindCatById($options);
        $i=0;
        foreach($data['post'] as $dataId){
            $data['post'][$i]['category']=CategoryModel::GetAllCatFromPost($dataId['id']);
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