<?php
$estaLogado = isset($_SESSION['email']);
if (!$estaLogado) {
  header('Location: login.php');
}
?>