<?php
// conexão
include 'conexion.php';
 
try {
     
    $id=isset($_GET['id']) ? $_GET['id'] : die('ERRO: ID não encontrado.');
 
    $query = "DELETE FROM produtos WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bindParam(1, $id);
     
    if ($stmt->execute()) {
      header('Location: produtos.php?action=deleted');
    } else {
      die('Não foi possível excluir o produto.');
    }
}
 
// mostrar erro
catch(PDOException $exception) {
  die('ERRO: ' . $exception->getMessage());
}
?>