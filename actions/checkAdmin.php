<?php
$isAdmin = isset($_SESSION['email']) && $_SESSION['email'] === 'admin@admin.com';
if (!$isAdmin) {
  header('Location:index.php');
}
?>