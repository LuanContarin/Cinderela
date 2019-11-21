<?php
require "conexion.php";
?>
<?php
if(isset($_POST['send'])){
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $confirma = $_POST['confirma'];
    if(empty($nome) || empty($email) || empty($senha)){
        echo "PREENCHA TODOS OS CAMPOS";
    }
    else{
        if ($senha == $confirma){
            $senha = md5($senha);
            $sql = "INSERT INTO usuario(nome, senha, email) VALUES('$nome', '$senha', '$email')";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            header('Location: login.php');
        }
        else{
            echo "AS SENHAS NÃO BATEM";
        }
    }
    
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar</title>
</head>
<body>
  <div class="form-wrapper" style="margin-top: 14px">
    <div class="form card">
      <div class="tac">
        <h3 class="title">Criar conta</h3>
      </div>
      <form method="post">
        <input class="inp" type="text" name="nome" id="nome" placeholder="Nome">
        <input class="inp" type="email" name="email" id="email" placeholder="Email">
        <input class="inp" type="password" name="senha" id="senha" placeholder="Senha">
        <input class="inp" type="password" name="confirma" placeholder="Confirmar senha">
        <input class="btn" type="submit" name="send" value="Enviar">
      </form>
    </div>
  </div>
</body>
</html>