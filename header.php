<?php
session_start(); 
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
          if (isset($_SESSION['email']) && $_SESSION['email'] == 'admin@admin.com') {
            echo '<a class="nav-link" href="./produtos.php">Produtos</span>';
          }
        ?>
        <?php if (true) {  ?>
          <a class='nav-link' href="./home.php">Home</a>
          <a class='nav-link' href="./carrinho.php">Carrinho</a>
        <?php } ?>
      </div>
      <div class="right">
        <?php
          if (isset($_SESSION['email'])) {
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
