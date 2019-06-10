<?php

abstract class Model
{
	protected $host;
	protected $user;
	protected $port;
	protected $password;
	protected $database;
	protected $charset;
	protected $dsn;
	protected $pdo; 

	function __construct()
	{
		$this->host = "localhost";
		$this->user = "root";
        $this->port = "3306";
        $this->password = "";
        $this->database = "techartbd";
        $this->charset = "utf8"; 
   
		$this->dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->database;charset=$this->charset";
        $this->pdo = new PDO($this->dsn, $this->user, $this->password);
	}

	abstract protected function get_data($value);	
}

?>