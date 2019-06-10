<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css"/>
    </head>
    <?php
    $host = "localhost";
    $user = "root";
    $port = "3306";
    $password = "";
    $database = "techartbd";
    $charset = "utf8"; 

    $newsPerPage = 5;

    $dsn = "mysql:host=$host;port=$port;dbname=$database;charset=$charset";
    $pdo = new PDO($dsn, $user, $password);

    if(!empty($_GET)){      
    $page = intval($_GET['page']);
    }
    else{                    
        $page = 0;
    }

    $query = $pdo->query("SELECT COUNT(*) FROM news");
    $result = $query->fetchColumn();
    $stringCount = $result/$newsPerPage;             

    $query = $pdo->prepare('SELECT * FROM news ORDER BY idate DESC LIMIT ?, ?');              
    $query->bindValue(1, $page*$newsPerPage, PDO::PARAM_INT);
    $query->bindValue(2, $newsPerPage, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetchAll();         
    ?>
    <body>
        <div class="wrapper">
            <h1>Новости</h1>
            <?php                   
                echo '<div class="newsList">';                   
                foreach ($result as $row)
                {  
                    echo '<div class="newsItem">';
                        echo '<div class="date">'.date('d.m.Y',$row[1]).'</div>';
                        echo '<div class="newsTitle"><a href="view.php?id='.$row[0].'">'.$row[2].'</a></div>';
                        echo '<div class="brief"><p>'.$row[3].'</p></div>';
                    echo '</div>';
                }
                echo '</div>';                
            ?>                          
            
            <div class="pagination_wrapper">
                <div class="pageTitle">
                    Страницы:                  
                </div>
                <div class="pagination">
                <?php                     
                    for ($i = 0; $i < $stringCount; ++$i) {
                        if($i == $page){
                            echo '<a class="active" href="?page='.$i.'">'.($i + 1).'</a>';
                        }
                        else{
                            echo '<a href="?page='.$i.'">'.($i + 1).'</a>';
                        }
                    }
                ?>                   
                </div>
            </div>
        </div>
    </body>
</html>
