<?php

class Model_news extends Model
{
        public function get_data($page_num)
        {

        $page = $page_num;

        $newsPerPage = 5;

        $query = $this->pdo->query("SELECT COUNT(*) FROM news");
                $result = $query->fetchColumn();
                $stringCount = $result/$newsPerPage;
                //var_dump($stringCount);

                $query = $this->pdo->prepare('SELECT * FROM news ORDER BY idate DESC LIMIT ?, ?');              
                $query->bindValue(1, $page*$newsPerPage, PDO::PARAM_INT);
                $query->bindValue(2, $newsPerPage, PDO::PARAM_INT);
                $query->execute();
                $result = $query->fetchAll();
                return array($stringCount, $result, $page);
        }
}

?>