<!DOCTYPE HTML>
<html>
<head>
    <title>Cinderela - Adicionar produtos</title>
      
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />         
</head>

<body>
  
    <!-- container -->
    <div class="container">
   
        <div class="page-header">
            <h1>Adicionar Produtos</h1>
        </div>
    </div>

    <!-- PHP dos produtos -->
<?php
if($_POST){
    
    include 'conexion.php';

    try{

        // Inserir query
        $query = "INSERT INTO produtos SET imagem=:imagem, nome=:nome, descricao=:descricao, preco=:preco, desconto=:desconto, quantidade=:quantidade";

        // preparar para execução
        $stmt = $con->prepare($query);

        // variáveis
        $imagem=htmlspecialchars(strip_tags($_POST['imagem']));
        $nome=htmlspecialchars(strip_tags($_POST['nome']));
        $descricao=htmlspecialchars(strip_tags($_POST['descricao']));
        $preco=htmlspecialchars(strip_tags($_POST['preco']));
        $desconto=htmlspecialchars(strip_tags($_POST['desconto']));
        $quantidade=htmlspecialchars(strip_tags($_POST['quantidade']));

        // binds
        $stmt->bindParam(':imagem', $imagem);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':desconto', $desconto);
        $stmt->bindParam(':quantidade', $quantidade);

        //Executar a query
        if($stmt ->execute()){
            echo "<div class='alert alert-success'>As informações foram salvas.</div>";
        }else{
            echo "<div class='alert alert-danger'>Não foi possível salvar.</div>";
        }
    }

    //Mostrar erro
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>

    <!-- HTML dos produtos -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method= "post">
        <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Imagem</td>
            <td><input type='file' name='imagem' class='form-control' /></td>
        </tr>
        <tr>
            <td>Nome</td>
            <td><input type='text' name='nome' class='form-control' /></td>
        </tr>
        <tr>
            <td>Descrição</td>
            <td><textarea name='descricao' class='form-control' /></textarea></td>
        </tr>
        <tr>
            <td>Preço</td>
            <td><input type='text' name='preco' class='form-control' /></td>
        </tr>
        <tr>
            <td>Desconto</td>
            <td><input type='text' name='desconto' class='form-control' /></td>
        </tr>
        <tr>
            <td>Quantidade</td>
            <td><input type='text' name='quantidade' class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Salvar' class='btn btn-primary' />
                <a href='produtos.php' class='btn btn-danger'>Voltar</a>
            </td>
        </tr>
    </table>
</form>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>