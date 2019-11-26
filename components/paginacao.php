<ul class="paginacao pull-left margin-zero mt0"></ul>

<?php

// botão primeira página
if ($page>1) {
  $prev_page = $page - 1;
  ?>
  <li>
    <a href="<?php echo $page_url ?>page=<?php echo $prev_page ?>">
      <span style="margin: 0 .5em;"></span>
    </a>
  </li>
  <?php
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
    ?>
    <li class="active">
      <a href="javascript::void()"><?php echo $x ?></a>
    </li>
    <?php
  }

  // not current page
  else {
    ?>
    <li>
      <a href="<?php echo $page_url ?>page=<?php echo $x0 ?>"></a>
    </li>
    <?php
    }
  }
}
// botão última página
if ($page<$total_pages) {
  $next_page = $page + 1;

  echo "<li>";
    echo "<a href='{$page_url}page={$next_page}'>";
      echo "<span style='margin:0 .5em;'>&raquo;</span>";
    echo "</a>";
  echo "</li>";
}

echo "</ul>";
?>