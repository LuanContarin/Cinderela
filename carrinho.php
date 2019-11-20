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
    foreach($_SESSION['cart'] as $key=> $value){
    if(in_array($_GET['id'], $value)){
        print_r($value);
    }
    }
}
    while(list(, $val) = each($_SESSION['cart'])){
        $id=$val['id'];
        // echo $id;
        // echo "SELECT * FROM produtos WHERE id=$id";
        $carrinho = $con->prepare("SELECT * FROM produtos WHERE id='$id'");
        $carrinho->execute();
        $row = $carrinho->fetch(PDO::FETCH_ASSOC);
        ?>
        <img src="uploads/<?php echo $row['imagem']; ?>">
        <p><?php echo $row['nome'];?></p>
        <p>R$ <?php echo $val['quantidade'] * $row['preco'];?></p>
        <?php
    }

if(isset($_POST['finalizar'])){
    $s = 0;
    for($i = 0; $i < sizeof($_SESSION['cart']); $i++){
        $id = $_SESSION['cart'][$i]['id'];
        $quantidade = $_SESSION['cart'][$i]['quantidade'];
        $finalizar = $con->prepare("SELECT * FROM produtos WHERE id='$id'");
        $finalizar->execute();
        $row = $finalizar->fetch(PDO::FETCH_ASSOC);
        $s += $row['preco'] * $quantidade;
    }
    echo $s;
        // $finalizar = $con->prepare("SELECT * FROM produtos WHERE id")
    }
?>
<a href="home.php"><button>Voltar</button></a>
<form method="post">
<input type="submit" name="finalizar" value="Finalizar compra">
</form>
<form method="post">
<input type="submit" value="Cancelar carrinho" name="cancelar">
</form>