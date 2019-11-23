<?php
session_start();
include __DIR__.'/../actions/sessionVariables.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cinderela</title>
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/produtos.css">
    <link rel="stylesheet" href="css/carrinho.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
  <nav class="navbar-wrapper">
    <div class="navbar">
      <div class="left">
        <?php
          global $isLogged, $isAdmin;
          if ($isLogged && $isAdmin) {
            echo '<a class="nav-link" href="./produtos.php">Produtos</span>';
          }
        ?>
        <?php global $isLogged;  if ($isLogged) {  ?>
          <a class='nav-link' href="./home.php">Comprar</a>
          <a class='nav-link' href="./carrinho.php">Carrinho</a>
        <?php } ?>
      </div>
      <div id="logo">
        <img src="logo.svg" alt="Logo Cinderela" width="300px">
      </div>
      <div class="right">
        <?php
          global $isLogged, $isAdmin, $email;
          if ($isLogged) {
            echo $email;
            echo '
              <a class="nav-link" href="logout.php">Logout</a>
            ';
          } else {
            echo '
              <a class="nav-link" href="login.php">Login</a>
            ';
          }
        ?>
      </div>
    </div>
  </nav>
