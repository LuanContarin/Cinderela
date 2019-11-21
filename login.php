<!-- Usar nos botoes os valores : 
Email -> usar name="email"
Senha -> usar name="senha" -->
<?php 
require "conexion.php";
if (isset($_POST['senha']))
{
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    if(empty($email) || empty($senha)){
        echo "Preencha todos os Campos";
    }
    $stmt = $con->prepare("SELECT * FROM `usuario` WHERE `email` = '$email'");
    if($stmt->execute()){
        if($stmt->rowCount() > 0){
    $senha = md5($senha);
    $resultado2 = $con->prepare("SELECT * FROM `usuario` WHERE `email` = '$email' and senha = '$senha'");
    if($resultado2->execute()){
        if($resultado2->rowCount() == 1)
        $line = $resultado2->fetch(PDO::FETCH_ASSOC);
        session_start();
        $_SESSION['email'] = $line['email'];
        
    header('Location: produtos.php');    
    }
    else{
        echo "Senha não correspondente ao respectivo usuário";
    }
    }
    else{
        echo "Não existe conta com esse respectivo email registrada em nosso sistema";
    }
}
}
?>
<html>
<body>
<?php
if (isset($_SESSION['email'])) {
  ?>
    <a href="logout.php"><button>Logout</button></a>
  <?php
} else {
  ?>
    <div class="form-wrapper" style="margin-top: 14px">
      <div class="form card">
        <div class="tac">
          <h3 class="title">Fazer login</h3>
        </div>
        <form method = "POST">
          <input class="inp" type="email" name="email" id="email" placeholder="Email">
          <input class="inp" type="password" name="senha" id="senha" placeholder="Senha">
          <input class="btn" type="submit" name="send" value="Enviar">
        </form>
      </div>
    </div>
  <?php
}
  ?>