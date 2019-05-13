<?php
namespace app\controllers;
use app\models\User;

class Login extends Controller{

	public function action_index($options)
	{
		$data = User::findByLogin($_POST["login"]);
	    if($data['password'] === md5(md5($_POST['password']))){
	        $hash = md5(User::generateCode(10));

			$User = new User;
	    	$User->setId($data['id_user']);
	    	$User->setHash($hash);
	    	$User->updateHash();

	        setcookie("id", $data['id_user'], time()+60*60*24*30);
	        setcookie("hash", $hash, time()+60*60*24*30,null,null,null,true); 

	        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
			header('Location:'.$host);
	    }
	    else{
	        print "Вы ввели неправильный логин/пароль";
	    }
    }


}