<?php
require 'header.php'
?>
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Cinderela - Produtos</h1>
        </div>

     <!-- PHP visualização -->

<?php
// conexão
include 'conexion.php';
$page = isset($_GET['page']) ? $_GET['page'] : 1;
 
$records_per_page = 5;
 
$from_record_num = ($records_per_page * $page) - $records_per_page;
?>

<script type='text/javascript'>
// confirm record deletion
function delete_user( id ){
     
    var answer = confirm('Você tem certeza?');
    if (answer){
        window.location = 'excluir.php?id=' + id;
    } 
}
</script>

<!-- Excluir -->
<?php
$action = isset($_GET['action']) ? $_GET['action'] : "";


if($action=='deleted'){
    echo "<div class='alert alert-success'>O Produto Foi Excluido.</div>";
}
 
// selects
$query = "SELECT id, imagem, nome, descricao, preco, desconto, quantidade, modificado FROM produtos ORDER BY id ASC
    LIMIT :from_record_num, :records_per_page";

$stmt = $con->prepare($query);
$stmt->bindParam(":from_record_num", $from_record_num, PDO::PARAM_INT);
$stmt->bindParam(":records_per_page", $records_per_page, PDO::PARAM_INT);
$stmt->execute();
 
// número de linhas
$num = $stmt->rowCount();
 
// link para criação
echo "<a href='criar.php' class='btn btn-primary m-b-1em'>Adicionar Produto</a>";
 
// checar numero a ser encontrado
if($num>0){
 echo "<table class='table table-hover table-responsive table-bordered'>";//começo da tabela
 
    //cabeçalho
    echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Imagem</th>";
        echo "<th>Nome</th>";
        echo "<th>Descrição</th>";
        echo "<th>Preço</th>";
        echo "<th>Desconto</th>";
        echo "<th>Quantidade</th>";
        echo "<th>Modificado</th>";
        echo "<th>Ação</th>";
    echo "</tr>";
     
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

    extract($row);

    echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$imagem}</td>";
        echo "<td>{$nome}</td>";
        echo "<td>{$descricao}</td>";
        echo "<td>R$ {$preco}</td>";
        echo "<td>{$desconto}%</td>";
        echo "<td>{$quantidade}</td>";
        echo "<td>{$modificado}</td>";
        echo "<td>";
            // botão visualizar
            echo "<a href='visualizar.php?id={$id}' class='btn btn-info m-r-1em'>Visualizar</a>";
             
            // botão editar
            echo "<a href='editar.php?id={$id}' class='btn btn-primary m-r-1em'>Editar</a>";
 
            // botão excluir
            echo "<a href='#' onclick='delete_user({$id});'  class='btn btn-danger'>Excluir</a>";
        echo "</td>";
    echo "</tr>";
}
 
// fim da tabela
echo "</table>";

$query = "SELECT COUNT(*) as total_rows FROM produtos";
$stmt = $con->prepare($query);

$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
$total_rows = $row['total_rows'];

$page_url="produtos.php?";
include_once "paginacao.php";
}
 
// se não encontrar
else{
    echo "<div class='alert alert-danger'>Nenhum produto encontrado.</div>";
}
?>
        
    </div>
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 
<!-- confirm delete record will be here -->
 <a href="logout.php"><button>Logout</button></a>
</body>
</html>
<?php

}
elseif(isset($_SESSION['email'])){
    header('location:home.php');
}
else{
    echo "400 nao autorizado";
}
?>