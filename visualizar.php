<!DOCTYPE HTML>
<html>
<head>
    <title>Cinderela - Visualizar</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
</head>

<body>
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Visualizar Produto</h1>
        </div>
         
    <!-- PHP visualizar -->
<?php

$id=isset($_GET['id']) ? $_GET['id'] : die('ERRO: ID não encontrado.');
 
//include database connection
include 'conexion.php';
 
// Visualizar informações do produto
try {
    // preparação query
    $query = "SELECT id, imagem, nome, descricao, preco, desconto, quantidade, modificado FROM produtos WHERE id = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
 
    // 1º marcador
    $stmt->bindParam(1, $id);
 
    // exec query
    $stmt->execute();
 
    // armazenar linha em variável
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // variáveis para preencher
    $imagem = $row['imagem'];
    $nome = $row['nome'];
    $descricao = $row['descricao'];
    $preco = $row['preco'];
    $desconto = $row['desconto'];
    $quantidade = $row['quantidade'];
    $modificado = $row['modificado'];

}
 
// show error
catch(PDOException $exception){
    die('ERRO: ' . $exception->getMessage());
}
?>
 
    <!-- HTML visualizar -->

<table class='table table-hover table-responsive table-bordered'>
    <tr>
        <td>Imagem</td>
        <td><?php echo htmlspecialchars($imagem, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Nome</td>
        <td><?php echo htmlspecialchars($nome, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Descrição</td>
        <td><?php echo htmlspecialchars($descricao, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Preço</td>
        <td><?php echo htmlspecialchars($preco, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Desconto</td>
        <td><?php echo htmlspecialchars($desconto, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Quantidade</td>
        <td><?php echo htmlspecialchars($quantidade, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Modificado</td>
        <td><?php echo htmlspecialchars($modificado, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <a href='produtos.php' class='btn btn-danger'>Voltar
        </td>
    </tr>
</table>

    </div>
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 
</body>
</html>