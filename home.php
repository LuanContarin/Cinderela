<?php
require 'header.php'
require "conexion.php";
?>

  <form method="post">
    <input type="search" name="pesquisa" id="">
  </form>
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
        for($i = 0; $i <= $resultado->rowCount(); ++$i) {
        
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
        
          if ( $intCont == 0 ) echo "<tr>\n";
          ?>
          <form action="carrinho.php?id=<?php echo $cod;?>" method="post">
            <br>
            <legend name="nome"><?php echo $nome; ?></legend>
            <img src="uploads/<?php echo $img; ?>" width = 200px height = 100px>
            <legend name='preco'><?php echo $preco; ?></legend>
            <input type="number" name="quantidade" >
            <br>
            <input type="submit" name="compra" value="Comprar">
            <input type="submit" name="excluir" value="Excluir">
          </form>
          <?php        
          if ( $intCont == $pNumColunas-1 ) {
           echo "</tr>\n";
          } else { $i++; }
        }
    }
}

GeraColunas(2, $sql, $con);
        ?>
        <br>
        <br>
        <a href="carrinho.php"><button type="button" name="carrinho" >Carrinho</button></a>
        <br>
        <br>
        <br>
        <a href="logout.php"><button>Logout</button></a>
        </body>
</html>