<?php
require 'actions/checkLogged.php';
require 'actions/checkAdmin.php';
require 'header.php';
include 'conexion.php';
?>
 
    <!-- container -->
<div class="tac" style="margin: 100px;font-size: 2em;">
  <h1>Admin - Editar produto</h1>
</div>
<div class="table-wrapper-wrapper">
  <div class="table-wrapper">
    <!-- PHP editar -->
<?php

$id=isset($_GET['id']) ? $_GET['id'] : die('ERRO: ID não encontrado.');

 
try {
  // preparação query
  $query = "SELECT id, imagem, nome, descricao, preco, desconto, quantidade, modificado FROM produtos WHERE id = ? LIMIT 0,1";
  $stmt = $con->prepare( $query );
    
  // 1º marcador
  $stmt->bindParam(1, $id);
    
  // exec query
  $stmt->execute();
    
  // arm. linha em variável
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
  // variáveis para preencher
  $imagem = $row['imagem'];
  
  if (isset($_FILES['imagem']['name'])) {
    $imagem=!empty($_FILES["imagem"]["name"])
    ? basename($_FILES["imagem"]["name"])
    : "";
    $imagem=htmlspecialchars(strip_tags($imagem));
  }
  $nome = $row['nome'];
  $descricao = $row['descricao'];
  $preco = $row['preco'];
  $desconto = $row['desconto'];
  $quantidade = $row['quantidade'];
  $modificado = $row['modificado'];
}
catch (PDOException $exception) {
  die('ERRO: ' . $exception->getMessage());
}
?>

<?php
if ($_POST) {
     
  try {
    $query = "UPDATE produtos
      SET imagem=:imagem, nome=:nome, descricao=:descricao, preco=:preco, desconto=:desconto, quantidade=:quantidade
      WHERE id =:id";

    // preparação query
    $stmt = $con->prepare($query);

    // variáveis
    $nome=htmlspecialchars(strip_tags($_POST['nome']));
    $descricao=htmlspecialchars(strip_tags($_POST['descricao']));
    $preco=htmlspecialchars(strip_tags($_POST['preco']));
    $desconto=htmlspecialchars(strip_tags($_POST['desconto']));
    $quantidade=htmlspecialchars(strip_tags($_POST['quantidade']));

    // binds
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':imagem', $imagem);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':desconto', $desconto);
    $stmt->bindParam(':quantidade', $quantidade);
      
    // Exec query
    if ($stmt->execute()) {
      echo "<div class='alert alert-success'>As informações foram salvas.</div>";
      if ($imagem) {
        $target_directory = "uploads/";
        $target_file = $target_directory . $imagem;
        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
        // erro
        $file_upload_error_messages="";
      }
      //verificar imagem
      try {
          getimagesize($_FILES['imagem']['tmp_name']);
      } catch (\Throwable $th) {
          $file_upload_error_messages = "<div>Arquivo indefinido</div>";
      }
      if (empty(getimagesize($_FILES["imagem"]["tmp_name"]))) {
      }
      $allowed_file_types=array("jpg", "jpeg", "png", "gif");
      if(!in_array($file_type, $allowed_file_types)){
        $file_upload_error_messages.="<div>Apenas JPG, JPEG, PNG e GIF são aceitos. </div>"; 
      }
      if (file_exists($target_file)) {
        $file_upload_error_messages.="<div>Imagem já existente.</div>";
      }
      if ($_FILES['imagem']['size'] > (1024000)) {
        $file_upload_error_messages.="<div>A imagem deve ter menos de 1MB.</div>";
      }
      if (!is_dir($target_directory)) {
        mkdir($target_directory, 077, true);
      }
      if (empty($file_upload_error_messages)) {
        move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);
      } else {
        echo "<div class='alert alert-danger'>";
          echo "<div>{$file_upload_error_messages}</div>";
          echo "<div>Faça update para enviar a foto.</div>";
        echo "</div>";
      }
    } else {
        echo "<div class='alert alert-danger'>Não foi possível salvar.</div>";
    }
  }
  catch (PDOException $exception) {
    die('ERRO: ' . $exception->getMessage());
  }
}
?>

    <!-- HTML editar -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" enctype="multipart/form-data" method="POST">
  <table style="width: 100%">
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
        <input type='submit' value='Salvar Mudanças' style="background: none;fotn-size: 1em;" class='admin-btn'/>
      </td>
    </tr>
  </table>
</form>
         
</div>
</div>

<?php
require 'footer.php';
?>
