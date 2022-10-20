<?php 
require('conexao.php');
if(!isset($_GET['id'])){
    header('Location: ./forum.php');
}
$pergunta_id = $_GET['id'];
$sql = "SELECT * FROM perguntas WHERE cod_pergunta = $pergunta_id";
$result = mysqli_query($conn, $sql);
$pergunta = mysqli_fetch_array($result, MYSQLI_ASSOC);

if(isset($_POST['post'])){
  $resposta = $_POST['resposta'];
  if(strlen($resposta) > 0){
    $sql = "INSERT INTO respostas (cod_pergunta, texto_resposta) VALUES 
    ('$pergunta_id','$resposta')";
    mysqli_query($conn, $sql);
  }
}
$sql = "SELECT * from respostas WHERE cod_pergunta = $pergunta_id";
$result = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Golden Voice</title>

  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css" />
  <link rel="stylesheet" href="styleforum.css" />
</head>

<body style="background-color:white;">

  <div class="page">

    <nav>
      <a id="logo" href="paginainicial.php">
        <img src="images/logohor.png" alt="logo" height="80px">
      </a>
      <!--  -->
      <ul>
        <li> <i class="fa fa-house" aria-hidden="true"> </i> <a href="paginainicial.php">Página Inicial</a></li>
        <li> <i class="fa fa-user" aria-hidden="true"> </i> <a href="perfil.php">Perfil </a></li>
        <li> <i class="fa fa-microphone" aria-hidden="true"></i> <a href="treinar.php">Treinar</a></li>
        <li> <i class="fa fa-power-off" aria-hidden="true"> </i><a href="#"> Sair</a></li> 
      </ul>

      
    </nav>
  </div>
  <div>
    <h1><?= $pergunta['texto_pergunta'] ?></h1>
    <form action="" method="post">
      <input type="text" name="resposta" />
      <input type="submit" value="Enviar" name="post">
    </form>
  <?php
   while($row = mysqli_fetch_assoc($result))
   {
  ?>
  <span><?= $row["texto_resposta"] ?></span>
  <?php } ?>
  </div>
<body style="background-color:white;">


