<?php
require 'components/header.php';
require "actions/conexion.php";
require 'actions/checkLogged.php';

?>
 
<?php

$idExiste = isset($_GET['id']);
if (!$idExiste) {
  echo 'javascript:window.history.go(-1)';
  exit;
}

$id = $_GET['id'];

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
  ?>
   <div class="tac" style="margin: 100px;font-size: 2em;">
    <h1><?php echo $nome ?></h1>
  </div>
  <div class="table-wrapper-wrapper">
    <div class="table-wrapper">
  <?php

}
 
// show error
catch (PDOException $exception) {
  die('ERRO: ' . $exception->getMessage());
}
?>

<div style="display: flex;justify-content: center;margin-bottom: 24px;">
  <div>
  <?php echo $imagem ? "<img src='uploads/{$imagem}' style='width:500px;' />" : "Sem imagem disponível."; ?>
    <form action="carrinho.php?id=<?php echo $id;?>" method="post">
      <div style="height: 27px;display: flex;justify-content: center">
        <input class="prod-num" type="number" name="quantidade" value="1">
        <input class='prod-btn' type="submit" name="compra" value="Comprar">
        <input class='prod-btn' type="submit" name="excluir" value="Excluir">
      </div>
    </div>
  </form>
</div>

<table style="width: 100%">
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
</table>
</div>
</div>
</div>
     
<?php
require 'components/footer.php';
?>