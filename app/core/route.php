<?php
namespace app\core;

use app\controllers\Error404;
use app\controllers\Login;
use app\controllers\Main;
use app\controllers\Post;
use app\controllers\Registration;

class Route
{
    /**
     *
     */
    public static function start()
	{
        $routes = [
            'myblog' => Main::class,
            'post' => Post::class,
            'login'=> Login::class,
            'registration'=>Registration::class,
            '404'=>Error404::class
        ];
        $options=1;
        $path=explode('/', $_SERVER['REQUEST_URI']);
        $url = 'myblog';

        if(!empty($path[2])) $url = $path[2];

        if(isset($path[3])) $options = $path[3];

	    if(isset($routes[$url])){
	        $className = $routes[$url];
	        $controller = new $className();
	        $controller->action_index($options);
        }
        else{
            Route::ErrorPage404();
        }


//
//		$controller_name = 'Main';
//		$action = 'index';
//		$routes = explode('/', $_SERVER['REQUEST_URI']);
//
//
//if ( !empty($routes[2]) )
//		{
//			$controller_name = $routes[2];
//		}
//
//		if ( !empty($routes[3]) )
//		{
//			$action = $routes[3];
//		}
//
//		$controller_name = '\\app\\controllers\\'.$controller_name;
//		$action = 'action_'.$action;
//
//		$controller = new $controller_name;
//
//
//		if(method_exists($controller, $action))
//		{
//			$controller->$action();
//		}
//		else
//		{
//			Route::ErrorPage404();
//		}
	
	}
	
	public static function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/'.'myblog/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}

