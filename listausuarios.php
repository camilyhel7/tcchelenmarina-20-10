<!DOCTYPE html>
<html lang="pt-br">
    <head>
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="stylelistagem.css">
    </head>

<?php 
include('conexao.php');
include('cabecalho.php');

$sql = "SELECT * FROM usuarios";
$query = mysqli_query($conn, $sql);
?>
<div class='container'>

    <h3 class='p-3'>Usuários Cadastrados</h3>


    <table class="table">
        <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>Email</td>
            <td>Descrição Perfil</td>
            <td>Conquistas</td>
            <td>Foto Perfil</td>
            <td></td>
        </tr>

        <?php while ($dados = mysqli_fetch_array($query)) { ?>
            <tr>
                <td><?php echo $dados['cod_usuario'] ?></td>
                <td><?php echo $dados['nome'] ?></td>
                <td><?php echo $dados['email'] ?></td>
                <td><?php echo $dados['descricao_perfil'] ?></td>
                <td><?php echo $dados['conquistas'] ?></td>
                <td><?php echo $dados['foto_perfil'] ?></td>
                
                
                <td colspan="2" class="text-center">
                <a class="btex" onclick="confirmar(<?php echo $dados['cod_usuario'] ?>)">Excluir</a></td>
            </tr>
        <?php } ?>
    </table>
</div>
<script>
    function confirmar(cod) {
        if (confirm('Você realmente deseja excluir esta linha?'))
            location.href = 'excluiUsuario.php?cod_usuario=' + cod;
    }
</script> 