<?php
namespace app\controllers;

class Controller {
	
	public $model;
	public $view;
	
	public function __construct()
	{
		$this->view = new \app\core\View();
	}
	
	public function action_index()
	{
	}
}