<?php
include('restrito.php');
//include('inc/conexao.php');
if ((isset($_GET['id'])) && ($_GET['id'] != "")){
    // Tenta se conectar ao servidor MySQL
    $dbhandle = mysqli_connect('db', 'votacao', 'voto2020') or trigger_error(mysqli_error($dbhandle));
    // $dbhandle = mysqli_connect('localhost', 'root', '') or trigger_error(mysqli_error($dbhandle));
    // Tenta se conectar a um banco de dados MySQL
    mysqli_select_db($dbhandle, 'consulta_voto') or trigger_error(mysqli_error($dbhandle));

    $id = mysqli_real_escape_string($dbhandle,$_GET['id']) ;
    // Validação do usuário/senha digitados
  //  $sql = "SELECT * FROM `eleitores_votacao` WHERE `registrado_por` = ".$id.";";
    // $sql = "SELECT * FROM `usuarios` WHERE `id` = ".$id.";";
    // $query = mysqli_query($dbhandle, $sql);
    // $registrou_voto = mysqli_num_rows($query);

    // if (mysqli_num_rows($query) > 0) {
    //     // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
    //    // echo "<script> alert('Usuário com confirmação de voto registrada.\n Não é possivel excluir usuario.'); </script>"; 
    //     echo '<div class="alert alert-info" role="alert">Não é possivel excluir usuario! <br> Usuário com confirmação de voto registrada.</div>';
    // } else {
        // Excluir usuário
        $sql = "DELETE FROM `usuarios` WHERE `id` = ".$id.";" ;
       // $query = mysqli_query($dbhandle, $sql);
        // sql to delete a record
       // $sql = "DELETE FROM `usuario` WHERE `id` = ".$id.";";
    
        if (mysqli_query($dbhandle, $sql)) {
            echo "<script>alert('Usuário excluido com sucesso!'); </script>";
            echo '<div class="alert alert-info" role="alert"><br>Usuário excluido com sucesso!<br> <a href="#" onclick="location.reload();" >Atualizar lista</a> </div>';
        } else {
            echo "<script>alert('Erro ao excluir: '); </script>" . mysqli_error($dbhandle);
        }
        $dbhandle->close();
    //}
}
?>