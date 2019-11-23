<?php
require 'header.php';
require "conexion.php";
require 'actions/checkLogged.php';

?>

<div class="tac" style="margin: 100px;font-size: 2em;">
  <h1>Produtos</h1>
</div>

<?php 
  $query = "SELECT * FROM produtos";
  $stmt = $con->prepare($query);
  $stmt->execute();
?>
 
<?php

if (isset($_POST['pesquisa'])) {
  $pesquisa = $_POST['pesquisa'];
  $sql = "SELECT * FROM produtos WHERE nome like '%$pesquisa%' ORDER BY id";
} else {
  $sql = "SELECT * FROM produtos ORDER BY id";
}
?>
</td>
</tr>
<?php
function GeraColunas($pNumColunas, $pQuery, $con) {
  $resultado =$con->prepare($pQuery);
  $resultado->execute();
  echo ("<table width='100%' border='0'>\n");
  for ($i = 0; $i <= $resultado->rowCount(); ++$i) {
    for ($intCont = 0; $intCont < $pNumColunas; $intCont++) {
      $linha = $resultado->fetch(PDO::FETCH_ASSOC);
      if ($i > $linha) {
        if ( $intCont < $pNumColunas-1) echo "</tr>\n";
        break;
      }
    
      $cod = $linha['id'];
      $nome = $linha['nome'];
      $img = $linha['imagem'];
      
      $preco = number_format($linha['preco'],2,",",".");
    
      if ($intCont == 0) echo "<tr>\n";
      ?>
      <div class="produto">
        <form action="carrinho.php?id=<?php echo $cod;?>" method="post">
          <div class="prod-title-wrapper">
            <legend class="prod-title" name="nome"><?php echo $nome; ?></legend>
          </div>
          <div class="cont">
            <div class="preco">
              <?php echo $preco; ?>
            </div>
            <div class="on-hover">
              <div class="info">
                <input class="prod-num" type="number" name="quantidade" value="1">
                <input class='prod-btn' type="submit" name="compra" value="Comprar">
                <input class='prod-btn' type="submit" name="excluir" value="Excluir">
              </div>
            </div>
          </div>
          <div class="img-wrapper">
            <div class="prod-img"
              style="background-image: url('uploads/<?php echo $img ?>')"
            ></div>
          </div>
        </form>
      </div>
      <?php        
      if ( $intCont == $pNumColunas-1 ) {
        echo "</tr>\n";
      } else { $i++; }
    }
  }
}
?>

<div class="produtos-wrapper" style='margin-bottom: 300px'>
  <div class="produtos-cont">
    <form method="post">
      <div class="search-produto">
        <input class="produtos-search" type="search" placeholder="Pesquisar produto..." name="pesquisa" id="">
        <a href="carrinho.php"><button class="cont-btn" type="button" name="carrinho" >Ver carrinho</button></a>
      </div>
    </form>
    <div class="produtos">
      <?php
        GeraColunas(2, $sql, $con);
      ?>
  </div>
  </div>
</div>

<?php
require 'footer.php';
?>
