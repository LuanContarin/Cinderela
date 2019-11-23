<?php
$isAdmin = $_SESSION['email'] === 'admin@admin';
if (!$isAdmin) {
  header('Location: home.php');
}
?>