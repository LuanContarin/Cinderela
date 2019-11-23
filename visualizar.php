<?php
require "header.php";
require "conexion.php";
require 'actions/checkLogged.php';
require 'actions/checkAdmin.php';

?>
 
 <div class="tac" style="margin: 100px;font-size: 2em;">
  <h1>Admin - Visualizar produto</h1>
</div>
<div class="table-wrapper-wrapper">
  <div class="table-wrapper">
<?php

$id=isset($_GET['id']) ? $_GET['id'] : die('ERRO: ID não encontrado.');

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
catch (PDOException $exception) {
  die('ERRO: ' . $exception->getMessage());
}
?>
 
    <!-- HTML visualizar -->

<table style="width: 100%">
  <tr>
    <td>Imagem</td>
    <td><?php echo htmlspecialchars($row['imagem'], ENT_QUOTES);  ?></td>
    <td> 
      <?php echo $imagem ? "<img src='uploads/{$imagem}' style='width:300px;' />" : "Sem imagem disponível."; ?>
    </td>
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
      <a href='produtos.php' class='admin-btn'>Voltar</a>
  </td>
  </tr>
</table>
</div>
</div>
</div>
     
<?php
require 'footer.php';
?>