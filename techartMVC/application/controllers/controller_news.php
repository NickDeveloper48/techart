<?php

class Controller_news extends Controller
{

	function __construct()
	{
		$this->model = new Model_news();
		$this->view = new View();
	}
	
	function action_index()
	{
		$this->action_page(0);		
	}

	function action_page($page_num)
	{
		$data = $this->model->get_data(intval($page_num));		
		$this->view->generate('view_news.php', 'view_template.php', $data);
	}
}

?>