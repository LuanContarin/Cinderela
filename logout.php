
<?php
 session_start();
  require 'actions/checkLogged.php';
 session_unset();
 session_destroy();
 header("Location: index.php?logout=true");
?>
