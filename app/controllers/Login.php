<?php
namespace app\controllers;
use app\models\User;

class Login extends Controller{

	public function action_index()
	{
	$data = User::findByLogin($_POST["login"]);
	while($data){ 
	    // Сравниваем пароли
	    if($data['password'] === md5(md5($_POST['password']))){
	        // Генерируем случайное число и шифруем его
	        $hash = md5(generateCode(10));
	        $user_id= $data['user_id'];
	        // Записываем в БД новый хеш авторизации и IP
	        // $add_row = $connection->exec( "UPDATE user SET user_hash='$hash' WHERE user_id='$user_id'");
	        if($add_row){
	            echo "Модель успешно обновлена в базе";
	            }
	        else {echo "Ошибка обновления UPDATE users SET user_hash='".$hash."' WHERE user_id='".$user_id."'"; 
	        }

	        // Ставим куки
	        setcookie("id", $data['user_id'], time()+60*60*24*30);
	        setcookie("hash", $hash, time()+60*60*24*30,null,null,null,true); // httponly !!!

	        // Переадресовываем браузер на страницу проверки нашего скрипта
	        // header("Location: check.php"); exit();
	    }
	    else{
	        print "Вы ввели неправильный логин/пароль";
	    }
    }

	}
}