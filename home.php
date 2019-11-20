<?php
require "conexion.php";
?>
<!DOCTYPE html>
<html>
<head>
<title> Carrinho de Compras </title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
</head>

<body>
<?php 
    $query = "SELECT * FROM produtos";
    $stmt = $con->prepare($query);
    $stmt->execute();       
?>
 
<?php
$sql = "SELECT * FROM produtos ORDER BY id asc"
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
            <a>Nome do produto</a>
            <br>
            <legend name="nome"><?php echo $nome; ?></legend>
            <img src="uploads/<?php echo $img; ?>" alt="" srcset="">
            <legend name='preco'><?php echo $preco; ?></legend>
            <input type="number" name="quantidade" >
            <br>
            <input type="submit" name="compra" value="Comprar">
            <input type="submit" name="excluir" value="Excluir">
            <br>
            <br>
            <br>
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
        <a href="carrinho.php?carrinho=Carrinho"><button type="button" name="carrinho" >Carrinho</button></a>
        </body>
</html>