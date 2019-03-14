<?php
namespace app\controllers;
use app\models\User;

class Main extends Controller {


	public function action_index()
	{


		$this->view->generate('main_view.php', 'template_view.php');
	}

}