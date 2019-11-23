<?php
require 'header.php';
include 'conexion.php';
require 'actions/checkLogged.php';
require 'actions/checkAdmin.php';
?>
  
<div class="tac" style="margin: 100px;font-size: 2em;">
  <h1>Adicionar produtos</h1>
</div>

<div class="table-wrapper-wrapper">
  <div class="table-wrapper">

<?php

if ($_POST) {
  try {

    // Inserir query
    $query = "INSERT INTO produtos SET imagem=:imagem, nome=:nome, descricao=:descricao, preco=:preco, desconto=:desconto, quantidade=:quantidade";

    // preparar para execução
    $stmt = $con->prepare($query);

    //campo da imagem
    $imagem=!empty($_FILES["imagem"]["name"])
        ? basename($_FILES["imagem"]["name"])
        : "";
    $imagem=htmlspecialchars(strip_tags($imagem));
    // variáveis

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
    if ($stmt ->execute()) {
      echo "<div class='alert alert-success'>As informações foram salvas.</div>";
      if ($imagem) {
        $target_directory = "uploads/";
        $target_file = $target_directory . $imagem;
        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
        // erro
        $file_upload_error_messages="";
      }
      //verificar imagem
      $check = getimagesize($_FILES["imagem"]["tmp_name"]);
      if ($check!==false) {

      } else {
        $file_upload_error_messages.="<div>Arquivo não compativel.</div>";
      }
      $allowed_file_types=array("jpg", "jpeg", "png", "gif");
      if (!in_array($file_type, $allowed_file_types)) {
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
      }
      else {
        echo "<div class='alert alert-danger'>";
          echo "<div>{$file_upload_error_messages}</div>";
          echo "<div>Faça update para enviar a foto.</div>";
        echo "</div>";
      }
    } else {
      echo "<div class='alert alert-danger'>Não foi possível salvar.</div>";
    }
  }

  //Mostrar erro
  catch (PDOException $exception) {
    die('ERROR: ' . $exception->getMessage());
  }
}
?>

<!-- HTML dos produtos -->
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="POST">
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
        <input type='submit' value='Salvar' class='btn btn-primary' />
      </td>
    </tr>
  </table>
</form>

  </div>
</div>

<?php
require 'footer.php';
?>