<?php

class Model_view extends Model
{
	public function get_data($val)
	{	

        $id = $val;
        //var_dump($id);
        
        $query = $this->pdo->prepare("SELECT * FROM news WHERE id = ?");
        $query->execute(array($id));
        $result = $query->fetch();

		return array($result[2], $result[4]);
	}
}

?>