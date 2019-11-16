<!-- Usar nos botoes os valores : 
Nome -> usar name="nome"
Email -> usar name="email"
Senha -> usar name="senha" -->
<html>
<body>
<?php 
require "conexion.php";
if (isset($_POST['nome']))
{
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    if(empty($nome) || empty($email) || empty($senha)){
        echo "Preencha todos os Campos";
    }
    $resultado = mysqli_query($conexao, "SELECT * FROM `usuario` WHERE `email` = '$email'");
    if(mysqli_num_rows($resultado)>0){
    $senha = md5($senha);
    $resultado2 = mysqli_query($conexao, "SELECT * FROM `usuario` WHERE `email` = '$email' and senha = '$senha'");
    if(mysqli_num_rows($resultado2)==1){
    header('location:produtos.php');    
    }
    else{
        echo "Senha não correspondente ao respectivo usuário";
    }
    }
    else{
        echo "Não existe conta com esse respectivo email registrada em nosso sistema";
    }
}
?>
<form method = "POST">
        <input type="email" name="email" id="email" placeholder="Email">
        <input type="password" name="senha" id="senha" placeholder="Senha">
        <input type="submit" name="send" value="Enviar">
        </form>
</body>
</html>