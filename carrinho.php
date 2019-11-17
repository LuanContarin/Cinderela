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
$sql = "SELECT * FROM produtos ORDER BY RAND() LIMIT 0,4"
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
          echo "<td>";
          // Aqui você inclui o conteudo
          echo "<table width='266' border='0' cellspacing='0' cellpadding='0'>";
          echo "<tr>";
          echo "<td width='250' height='141' valign='middle'><div align='center'><img src='produtos/".$img."' border='0' width='189' height='141' /></div></td>";
          echo "</tr>";
          echo "<tr>";
          echo "<td>";
          echo "<table width='92%' border='0' align='center' cellpadding='0' cellspacing='0'>";
          echo "<tr>";
          echo "<td><div align='center' style='font-size:10px;font-family:Verdana'><strong><a href='carrinho.php?cod=".$cod."&acao=incluir'>".$nome."</a></strong></div><strong><div align='center'><font color='#FF0000' size='4px'> R$ ".$preco." </font></strong></div></td>";
          echo "</tr>";
          echo "<tr>";
          echo "<td><div align='center' style='font-size:10px;font-family:Verdana'><a href='carrinho.php?cod=".$cod."&acao=incluir'><img src='img/produtos.jpg' border='0' width='50px' height='50px'/></a></div><br></td>";
          echo "</tr>";
          echo "</table>";
          echo "</td>";
          echo "</tr>";
          echo "</table>";
          
           // Aqui é o final do conteudo
          echo "</td>";
        
          if ( $intCont == $pNumColunas-1 ) {
           echo "</tr>\n";
          } else { $i++; }
        }
    }
}
GeraColunas(2, $sql, $con);
        ?>
        </body>
</html>