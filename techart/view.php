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
    
    $dsn = "mysql:host=$host;port=$port;dbname=$database;charset=$charset";
    $pdo = new PDO($dsn, $user, $password);

    $id = intval($_GET['id']);

    $query = $pdo->prepare("SELECT * FROM news WHERE id = ?");
    $query->execute(array($id));
    $result = $query->fetch();
    ?>
    <body>     
        <div class="wrapper">
            <?php                     
            echo '<h1>'.$result[2].'</h1>';
            echo '<div class="news_content">'.$result[4].'</div>'; 
            ?> 
            <div class="footer">
               <a href="news.php?page=0">Все новости >></a>
            </div>
         </div>         
    </body>
</html>