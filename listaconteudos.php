<!DOCTYPE html>
<html lang="pt-br">
<meta charset="UTF-8">

<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <script src="https://kit.fontawesome.com/9884a810af.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="stylelistagem.css"> 
</head>
 

<?php
include('conexao.php');
include('cabecalho.php');

$sql = "SELECT * FROM conteudo";
$query = mysqli_query($conn, $sql);
?>
<div class='container'>

    <h3 class='p-3'>Conteúdos Cadastrados</h3>

    <a class="button" href="admin.php" target="_blank">
          <i class="fa fa-book" ></i>
          Cadastrar novo
        </a>

    <table class="table">
        <tr>
            <td>ID</td>
            <td>Título</td>
            <td>Mídia</td>
            <td>Descrição Card</td>
            <td>Enunciado</td>
            <td></td>
        </tr>

        <?php while ($dados = mysqli_fetch_array($query)) { ?>
                <tr>
                <td><?php echo $dados['cod_conteudo'] ?></td>
                <td><?php echo $dados['titulo'] ?></td>
                <td><?php echo $dados['midia'] ?></td>
                <td><?php echo $dados['descricao'] ?></td>
                <td><?php echo $dados['enunciado'] ?></td>     
        
                <td colspan="2" class="text-center">
                    <a class="btex" href='editaconteudo.php?cod_conteudo=<?php echo $dados['cod_conteudo'] ?>'>Editar</a>
                    <a class="btex" onclick="confirmar(<?php echo $dados['cod_conteudo'] ?>)">Excluir</a></td>
            </tr>
        <?php } ?>
    </table>
</div>
<script>
    function confirmar(cod) {
        if (confirm('Você realmente deseja excluir esta linha?'))
            location.href = 'excluiconteudo.php?cod_conteudo=' + cod;
    }
</script>