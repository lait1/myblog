<?php
namespace app\controllers;
use app\models\User;

Class Registration extends Controller {

	public function action_index()
	{
		$this->view->generate('access_view.php', 'registration_view.php');
	}
}