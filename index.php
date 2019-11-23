<?php
if (!isset($_SESSION['email'])) {
  require "login.php";
} else {
  require "home.php";
}
?>