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
    $resultado = mysqli_query($conexao, "SELECT * FROM `usuario` WHERE `email` = '$email'");
    if(mysqli_num_rows($resultado)>0){
    $senha = md5($senha);
    $resultado2 = mysqli_query($conexao, "SELECT * FROM `usuario` WHERE `email` = '$email' and senha = '$senha'");
    if(mysqli_num_rows($resultado2)==1){
        $line = mysqli_fetch_assoc($resultado2);
        $_SESSION['id'] = $line['id'];
        
    header('Location: index.php');    
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
<html>
<body>
<form method = "POST">
        <input type="email" name="email" id="email" placeholder="Email">
        <input type="password" name="senha" id="senha" placeholder="Senha">
        <input type="submit" name="send" value="Enviar">
        </form>
</body>
</html>