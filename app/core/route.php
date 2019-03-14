<?php
namespace app\core;

class Route
{
	public static function start()
	{
	
		$controller_name = 'Main';
		$action = 'index';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		if ( !empty($routes[2]) )
		{	
			$controller_name = $routes[2];
		}
		
		if ( !empty($routes[3]) )
		{
			$action = $routes[3];
		}

		$controller_name = '\\app\\controllers\\'.$controller_name;
		$action = 'action_'.$action;


		// // подцепляем файл с классом контроллера
		// $controller_file = strtolower($controller_name).'.php';
		// $controller_path = "app/controllers/".$controller_file;
		// if(file_exists($controller_path))
		// {
		// 	include "app/controllers/".$controller_file;
		// }
		// else
		// {
	
		// 	Route::ErrorPage404();
		// }
		
		$controller = new $controller_name;
	
		
		if(method_exists($controller, $action))
		{
			$controller->$action();
		}
		else
		{
			Route::ErrorPage404();
		}
	
	}
	
	public function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/'.'myblog/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}

