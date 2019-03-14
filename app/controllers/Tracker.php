<?php
namespace app\controllers;
use app\models\Tracker as ModelTracker;

class Tracker extends Controller {


	public function action_index()
	{

		$data = ModelTracker::getAllTrackers();
		echo json_encode($data);
	}

	public function action_create()
	{

		$data = new ModelTracker($_POST);
		if($data->addTracker())
		{
	        $host = 'http://'.$_SERVER['HTTP_HOST'].'/'.'monitoring/';
			header('Location:'.$host);
		}
		else 
		{	
			echo "Ошибка,добавление не удалось"; 
        }
    }    
}