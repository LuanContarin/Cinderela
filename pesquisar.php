<!-- Utilizar, para pesquisa, nas outras páginas, como variável, 'pesquisa' -->
<?php
    require "conexion.php";
    if(isset($_POST['pesquisa'])){
    $pesquisa = $_POST['pesquisa'];
    $stmt = $con->prepare("SELECT * FROM produtos WHERE nome like '%$pesquisa%'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<p>".$row['nome']. "</p>"; 
    extract($row);
    echo "<table class='table table-hover table-responsive table-bordered'>";
    echo "<tr>";
        echo "<td>{$imagem}</td>";
        echo "<td>{$nome}</td>";
        echo "<td>{$descricao}</td>";
        echo "<td>R$ {$preco}</td>";
        echo "<td>";

            echo "<a href='carrinho.php?id={$id}' class='btn btn-primary m-r-1em'>Adicionar ao Carrinho</a>";

        echo "</td>";
    echo "</tr>";
}

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post">
    <input type="search" name="pesquisa" id="">
    </form>
</body>
</html>