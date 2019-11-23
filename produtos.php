<?php
require 'header.php';
include 'conexion.php';

if ($_SESSION['email'] == 'admin@admin.com') {
?>

 
<div class="tac" style="margin: 100px;font-size: 2em;">
  <h1>Admin - Produtos</h1>
</div>
<div class="table-wrapper-wrapper">
  <div class="table-wrapper">
<?php
// conexão
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
?>


<div class="admin-btn-wrapper">
  <a href='criar.php' class='admin-btn' >Adicionar Produto</a>
</div>

<?php

// checar numero a ser encontrado
if ($num>0) {
 echo "<table class='table'>";
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
     
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
        echo "<a class='admin-btn' href='visualizar.php?id={$id}'>Visualizar</a>";
        echo "<a class='admin-btn' href='editar.php?id={$id}'>Editar</a>";
        echo "<a class='admin-btn' href='#' onclick='delete_user({$id});' >Excluir</a>";
      echo "</td>";
    echo "</tr>";
  }
 
  echo "</table>";

  $query = "SELECT COUNT(*) as total_rows FROM produtos";
  $stmt = $con->prepare($query);

  $stmt->execute();

  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $total_rows = $row['total_rows'];

  $page_url="produtos.php?";
  include_once "paginacao.php";
} else {
  echo "<div class='alert alert-danger'>Nenhum produto encontrado.</div>";
}
?>
        
</div>
</div>
</div>
<?php

} else if (isset($_SESSION['email'])) {
  header('location:home.php');
}
else {
  echo "400 nao autorizado";
}
?>
<?php
require 'footer.php';
?>
