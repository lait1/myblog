<?php
namespace app\core;

use app\controllers\Add;
use app\controllers\Category;
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
            '404'=>Error404::class,
            'add'=>Add::class,
            'category'=>Category::class,
        ];
        $options='index';
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

	}
	
	public static function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/'.'myblog/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}

