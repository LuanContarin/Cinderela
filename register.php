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
            mysqli_query($conexao, $sql);
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
    <form method="post">
        <input type="text" name="nome" id="nome" placeholder="Nome">
        <input type="email" name="email" id="email" placeholder="Email">
        <input type="password" name="senha" id="senha" placeholder="Senha">
        <input type="password" name="confirma" placeholder="Confirmar senha">
        <input type="submit" name="send" value="Enviar">
    </form>
</body>
</html>