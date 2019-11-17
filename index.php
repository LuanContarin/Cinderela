<?php
require_once "header.php";
if(!isset($_SESSION['email'])){
    require "register.php";
}
?>
<?php
require_once "footer.php";
?>