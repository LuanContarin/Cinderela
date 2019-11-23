<?php
require 'header.php';
require 'conexion.php';
?>

<div class="tac" style="margin: 100px;font-size: 2em;">
  <h1>Produtos no carrinho</h1>
</div>

<?php
if(isset($_POST['compra'])){
    $c = 0;
    $cod=$_GET['id'];
    $quantidade = $_POST['quantidade'];
    $compra = array('id'=>$cod, 'quantidade'=>$quantidade);
    if(isset($_SESSION['cart'])){
        for($i= 0; $i < sizeof($_SESSION['cart']); $i++){
            if($cod == $_SESSION['cart'][$i]['id']){
                $c += 1;
                $_SESSION['cart'][$i]['quantidade']+= $quantidade;
            }
        }
        if($c == 0){
        array_push($_SESSION['cart'], $compra);
        }
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
    $cod = $_GET['id'];
    for($i = 0; $i < sizeof($_SESSION['cart']); $i++){
        $id = $_SESSION['cart'][$i]['id'];
        if($cod == $id){
            unset($_SESSION['cart'][$i]);
        break;
        }
    }
    header("Location: home.php");
}
?>

<div class="produtos-wrapper" style='margin-bottom: 300px'>
  <div class="produtos-cont">
    <div class="produtos">

<?php
    while(list(, $val) = each($_SESSION['cart'])){
        $id=$val['id'];
        // echo $id;
        // echo "SELECT * FROM produtos WHERE id=$id";
        $carrinho = $con->prepare("SELECT * FROM produtos WHERE id='$id'");
        $carrinho->execute();
        $row = $carrinho->fetch(PDO::FETCH_ASSOC);
        ?>
          <div class="produto">
          <div class="prod-title-wrapper">
            <legend class="prod-title" name="nome"><?php echo $row['nome'];?></legend>
          </div>
          <div class="cont">
            <div class="preco">
              R$ <?php echo $val['quantidade'] * $row['preco'];?>
            </div>
          </div>
          <div class="img-wrapper">
            <div class="prod-img"
              style="background-image: url('uploads/<?php echo $row['imagem']; ?>')"
            ></div>
          </div>

        <?php
    }
    
    ?>
        </div>
  </div>
</div>
    <?php
    // if(isset($_POST['card'])){
    //     $opcao=$_POST['cartao'];
    //     $parcela = $_POST['parcela'];
    //}

if(isset($_POST['finalizar'])){
    $parcela = $_POST['parcela'];
    // echo $parcela;
    $opcao = $_POST['cartao'];
    // echo $opcao;
    $s = 0;
    for($i = 0; $i < sizeof($_SESSION['cart']); $i++){
        $id = $_SESSION['cart'][$i]['id'];
        $quantidade = $_SESSION['cart'][$i]['quantidade'];
        $finalizar = $con->prepare("SELECT * FROM produtos WHERE id='$id'");
        $finalizar->execute();
        $row = $finalizar->fetch(PDO::FETCH_ASSOC);
        if($parcela == 1){
            $s += $row['preco'] *(1 - $row['desconto'] / 100)  * $quantidade; 
        }else{
        $s += $row['preco'] * $quantidade;
        }
    }
    // $header = "Mime Version: 1.0\n". "Content-type: text/html; charset=utf-8\n". "From: vini.bispo015@gmail.com";
    // echo $_SESSION['email'];
    // echo $header;
    echo "Parabéns ".$_SESSION['email']."\nVocê finalizou sua compra em {$parcela} parcelas de R$".number_format($s / $parcela, 2, ',', '.')." totalizando R$".number_format($s, 2, ',', '.')." no cartão de {$opcao}";
    // sleep(10);
    // $_SESSION['cart'] = array();
    // header("Location: home.php");
    ?>
    <form  method="post">
        <input type="submit" name="cancelar" value="Finalizar">
    </form>
    <?php
    }
?>
  <div class="carrinho-form">
    <a href="home.php"><button>Voltar</button></a>
    <form method="post">
      <input type="radio" name="cartao" value="Crédito">Crédito
      <input type="radio" name="cartao" value="Débito">Débito
      <input type="radio" name="parcela" value="1" >1
      <input type="radio" name="parcela" value="2" >2
      <input type="radio" name="parcela" value="3" >3
      <input type="radio" name="parcela" value="4" >4
      <input type="radio" name="parcela" value="5" >5
      <!-- <input type="submit" name="finalizar" value="Continuar"> -->
      <input type="submit" name="finalizar" value="Finalizar compra">
    </form>
    <form method="post">
      <input type="submit" value="Cancelar carrinho" name="cancelar">
    </form>
  </div>
</div>


<?php
require 'footer.php';
?>