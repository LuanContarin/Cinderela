<!DOCTYPE html>
<html>
<head>
<title> Carrinho de Compras </title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
</head>

<body>
<?php 
    require "conexion.php";
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
    function GeraColunas($pNumColunas, $pQuery) {
        $resultado = $con->prepare($pQuery);
        $resultado-> execute(); 
        echo ("<table width='100%' border='0'>\n");
        for  ($i = 0; $i <= $resultado->rowCount(); ++$i) {
            for ($intCont = 0; $intCont <$pNumColunas; $intCont++) {
                $linha = $resultado->fetch(PDO::FETCH_ASSOC);
                if ($i > $linha) {
                    if ($intCont < $pNumColunas-1) echo "</tr:\n";
                break;
                }
        }   }    
    }

    GeraColunas(2, $pQuery);

    $cod = $linha[0];
    $nome = $linha[1];
    $img = $linha[2];
    $preco = number_format($linha[3],2,",",".");

    if ($intCont == 0) echo "<tr>\n"; 
    echo "<td>";
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
    echo "<td><div align='center' style='font-size:10px;font-family:Verdana'><a href='carrinho.php?cod=".$cod."&acao=incluir'><img src='imgs/add_carrinho.jpg' border='0'/></a></div><br></td>";
    echo "</tr>";
    echo "</table>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</td>";
    
    if ($intCont == $pNumColunas-1) {
        echo "</tr>\n";
    } else { $i++; }



echo ('</table>'); 

?>
</body>
</html>