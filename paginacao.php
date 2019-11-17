<?php
echo "<ul class='pagination pull-left margin-zero mt0'>";
 
// botão primeira página
if($page>1){
 
    $prev_page = $page - 1;
    echo "<li>";
        echo "<a href='{$page_url}page={$prev_page}'>";
            echo "<span style='margin:0 .5em;'>&laquo;</span>";
        echo "</a>";
    echo "</li>";
}
 
// números clicáveis
$total_pages = ceil($total_rows / $records_per_page);
 
$range = 1;
 
$initial_num = $page - $range;
$condition_limit_num = ($page + $range)  + 1;
 
for ($x=$initial_num; $x<$condition_limit_num; $x++) {
 
    if (($x > 0) && ($x <= $total_pages)) {
 
        // pagina atual
        if ($x == $page) {
            echo "<li class='active'>";
                echo "<a href='javascript::void();'>{$x}</a>";
            echo "</li>";
        }
 
        // not current page
        else {
            echo "<li>";
                echo " <a href='{$page_url}page={$x}'>{$x}</a> ";
            echo "</li>";
        }
    }
}
// botão última página
if($page<$total_pages){
    $next_page = $page + 1;
 
    echo "<li>";
        echo "<a href='{$page_url}page={$next_page}'>";
            echo "<span style='margin:0 .5em;'>&raquo;</span>";
        echo "</a>";
    echo "</li>";
}

echo "</ul>";
?>