<?php

class Controller_view extends Controller
{

	function __construct()
	{
		$this->model = new Model_view();
		$this->view = new View();
	}

	function action_index()
	{
		$this->action_page(0);
	}
	
	function action_page($id)
	{       
		$data = $this->model->get_data($id);		
		$this->view->generate('view_view.php', 'view_template.php', $data);
	}
}

?>