<?php
session_start();
require "conexion.php";
if(isset($_POST['compra'])){
    $id=$_GET['id'];
    $quantidade = $_POST['quantidade'];
    $compra = array('id'=>$id, 'quantidade'=>$quantidade);
    if(isset($_SESSION['cart'])){
        array_push($_SESSION['cart'], $compra);
    }else{
        $_SESSION['cart'] = array($compra);
    }
    header('Location: home.php');
}
if(isset($_POST['cancelar'])){
    $_SESSION['cart'] = array();
    header('Location: home.php');
}
if(isset($_POST['excluir'])){
    foreach($_SESSION['cart'] as $value){
    if(in_array($_GET['id'], $value)){
        unset($value);
    }
    }
}
print_r($_SESSION['cart']);
?>
<a href="home.php"><button>Voltar</button></a>
<form method="post">
<input type="submit" name="finalizar" value="Finalizar compra">
</form>
<form method="post">
<input type="submit" value="Cancelar carrinho" name="cancelar">
</form>