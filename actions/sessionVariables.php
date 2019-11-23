<?php
$isLogged = false;
$isAdmin = false;
$email = null;
if (isset($_SESSION['email'])) {
  $isLogged = true;
  $email = $_SESSION['email'];
  $isAdmin = $email == 'admin@admin.com';
}
?>