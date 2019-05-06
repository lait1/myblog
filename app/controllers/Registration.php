<?php
namespace app\controllers;
use app\models\User;

Class Registration extends Controller {

	public function action_index($options)
	{
	    if(isset($paraneter)){
	        echo 'huuuuuiiiiii'.$options;
        }
		$this->view->generate('registration_view.php', 'template_view.php');

	}
	
	public function action_create()
	{
		$err = [];

	    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST["login"]))
	    {
	        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
	    }

	    if(strlen($_POST["login"]) < 3 or strlen($_POST["login"]) > 30)
	    {
	        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
	    }
	    if(count($err) == 0)
	    {

			$User = new User;
			$User->setName($_POST["user_name"]);
			$User->setLogin($_POST["login"]);
			$User->setPassword($_POST["password"]);
			$User->setAccess(1);
			$id = $User->insert();

			if($id > 0){
				$host = 'http://'.$_SERVER['HTTP_HOST'].'/'.'myblog/';
			    header('Location:'.$host);
			}
	    }
	    else
	    {
	    	print_r($err);
	    } 
		
		
	}
}