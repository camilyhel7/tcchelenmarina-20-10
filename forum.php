<?php 
require('conexao.php');
include('cabecalho.php');

if(isset($_POST['post'])){
  $pergunta = $_POST['pergunta'];
  if(strlen($pergunta) > 0){
    $sql = "INSERT INTO perguntas (texto_pergunta) VALUES ('$pergunta')";
    mysqli_query($conn, $sql);
  }
}
$sql = "SELECT * from perguntas";
$result = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css" />
  <link rel="stylesheet" href="styleforum.css" />
</head>

<body style="background-color:white;">

  <div class="page">

  </div>
  <div>
    <form action="" method="post">
      <input type="text" name="pergunta" />
      <input type="submit" value="Enviar" name="post">
    </form>
  <?php
   while($row = mysqli_fetch_assoc($result))
   {
  ?>
  <a href='pergunta.php?id=<?= $row["cod_pergunta"] ?>'><?= $row["texto_pergunta"] ?></a>
  <?php } ?>
  </div>
<body style="background-color:white;">


