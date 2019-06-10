<div class="wrapper">
    <h1>Новости</h1>
    <?php
    $stringCount = $data[0];
    $content = $data[1];
    $page = $data[2];
   // var_dump($data);
        if($content)
        {   
            echo '<div class="newsList">';                   
            foreach ($content as $row)
            { 
                echo '<div class="newsItem">';
                    echo '<div class="date">'.date('d.m.Y',$row[1]).'</div>';
                    echo '<div class="newsTitle"><a href="/techartMVC/view/page/'.$row[0].'">'.$row[2].'</a></div>';
                    echo '<div class="brief"><p>'.$row[3].'</p></div>';
                echo '</div>';
            }
            echo '</div>';
        }
    ?> 
    <div class="pagination_wrapper">
        <div class="pageTitle">
            Страницы:                  
        </div>
        <div class="pagination">
        <?php                     
            for ($i = 0; $i < $stringCount; ++$i) {
                if($i == $page){
                    echo '<a class="active" href="/techartMVC/news/page/'.$i.'">'.($i + 1).'</a>';
                }
                else{
                    echo '<a href="/techartMVC/news/page/'.$i.'">'.($i + 1).'</a>';
                }
            }
        ?>                   
        </div>
    </div>
</div>