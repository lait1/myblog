<?php
namespace app\controllers;
use app\models\User;

Class Registration extends Controller {

	public function action_index()
	{
		$this->view->generate('access_view.php', 'registration_view.php');
	}
	public function action_create()
	{
		echo $_POST["user_name"];
		echo $_POST["login"];
		echo $_POST["password"];
		$err = [];

	//    // проверям логин
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
				echo "WIN!!!";
			}
	    }
	    else
	    {
	    	print_r($err);
	    } 
		
		// $res = $User->CreateUser();
		// if($res == true){
		// 	$this->view->generate('main_view.php', 'template_view.php');
		// }else{
		// 	// Перенаправление на страницу с выводом ошибок
			// $this->view->generate('main_view.php', 'template_view.php', $res);
		// }
	}
}