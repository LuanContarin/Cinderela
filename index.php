<?php
require "header.php";
if(!isset($_SESSION['email'])){
    require "login.php";
}
?>
<?php
require "footer.php";
?>