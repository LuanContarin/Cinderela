<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cinderela</title>
    <link rel="stylesheet" href="./css/forms.css">
    <link rel="stylesheet" href="./css/navbar.css">
</head>
<body>
<nav class="navbar-wrapper shadow">
  <div class="navbar">
    <div class="left">
      <a class='nav-link' href="./produtos.php">Produtos</a>
      <a class='nav-link' href="./carrinho.php">Carrinho</a>
    </div>
    <div class="right">
      <?php
        if (isset($_SESSION['email'])) {
          echo '
            <a class="nav-link" href="./logout.php">Logout</a>
          ';
        } else {
          echo '
            <a class="nav-link" href="./login.php">Login</a>
          ';
        }
      ?>
    </div>
  </div>
</nav>
<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
