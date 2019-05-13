<?php
define('HomeUrl', 'http://'.$_SERVER['HTTP_HOST'].'/');

spl_autoload_register(function($class) {
	 include str_replace('\\', '/', $class) . '.php';
});

app\core\Route::start();
