<?php
namespace app\controllers;
use app\models\User;

class Main extends Controller {


	public function action_index()
	{
	if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])){
	    $id_user=intval($_COOKIE['id']);
	    $userdata = User::findByID($id_user);

	    while($userdata){ 
	        if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id'])){

	            setcookie("id", "", time() - 3600*24*30*12, "/");
	            setcookie("hash", "", time() - 3600*24*30*12, "/");
	            $data = "Хм, что-то не получилось";
	        }
	        else{
	            $data = "Привет, ".$userdata['user_login'].". Всё работает!";
	            
	        }
	    }
	}

	$this->view->generate('main_view.php', 'template_view.php');
			
	}

	public function action_login()
	{

		
	}
}