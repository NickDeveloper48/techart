<?php

abstract class Controller {
	
	protected $model;
	protected $view;
	
	function __construct()
	{
		$this->view = new View();
	}
	
	abstract protected function action_index();	
}

?>