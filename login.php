<!-- Usar nos botoes os valores : 
Email -> usar name="email"
Senha -> usar name="senha" -->
<?php 
require 'components/header.php';
require "actions/conexion.php";

if (isset($_POST['senha'])) {
  $email = addslashes($_POST['email']);
  $senha = addslashes($_POST['senha']);
  global $hasError, $msg;
  $hasError = false;
  $msg = '';
  if (empty($email) || empty($senha)) {
      $msg = 'Preencha todos os campos.';
      $hasError = true;
  } else {
    $stmt = $con->prepare("SELECT * FROM `usuario` WHERE `email` = '$email'");
    if ($stmt->execute()) {

      if ($stmt->rowCount() > 0) {
        $senha = md5($senha);
        $resultado2 = $con->prepare("SELECT * FROM `usuario` WHERE `email` = '$email' and senha = '$senha'");

        if ($resultado2->execute()) {
          if($resultado2->rowCount() == 1)
            $line = $resultado2->fetch(PDO::FETCH_ASSOC);
          $_SESSION['email'] = $line['email'];
          
          header('Location: produtos.php');
        } else {
          $msg = "Senha não correspondente ao respectivo usuário.";
          $hasError = true;
        }
      } else {
        $msg = "Não existe conta com esse respectivo email registrada em nosso sistema.";
        $hasError = true;
      }
    } else {
      print_r($stmt->errorInfo());
    }
}
}
?>
<div class="form-wrapper">
  <div class="form card shadow">
    <div class="tac">
      <h3 class="title">Fazer login</h3>
    </div>
    <form method = "POST">
      <input class="inp" type="email" name="email" id="email" placeholder="Email">
      <input class="inp" type="password" name="senha" id="senha" placeholder="Senha">
      <input class="btn" type="submit" name="send" value="Enviar">
    </form>
    <a class="link" href="./register.php">Nâo tem uma conta?</a>
    <div>
      <?php
        global $hasError, $msg;
        if ($hasError) echo '<span class="error">'.$msg.'</span>';
      ?>
    </div>
  </div>
</div>

<?php
require 'components/footer.php';
?>