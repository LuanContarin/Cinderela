<?php
$isAdmin = isset($_SESSION['email']) && $_SESSION['email'] === 'admin@admin';
if (!$isAdmin) {
  header('Location:index.php');
}
?>