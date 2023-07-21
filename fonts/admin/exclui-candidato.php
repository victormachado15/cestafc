<?php
include('restrito.php');
if ((isset($_GET['id'])) && ($_GET['id'] != "")){
    // Tenta se conectar ao servidor MySQL

     $dbhandle = mysqli_connect('localhost', 'id13390035_votacao2020', '$enh@_DTI2020') or trigger_error(mysqli_error($dbhandle));
    mysqli_select_db($dbhandle, 'id13390035_consulta_voto') or trigger_error(mysqli_error($dbhandle));
    // $dbhandle = mysqli_connect('db', 'votacao', 'voto2020') or trigger_error(mysqli_error($dbhandle));
    // $dbhandle = mysqli_connect('localhost', 'root', '') or trigger_error(mysqli_error($dbhandle));
    // mysqli_select_db($dbhandle, 'votacao') or trigger_error(mysqli_error($dbhandle));

    // *mysqli_select_db($dbhandle, 'consulta_voto') or trigger_error(mysqli_error($dbhandle));

    $id = mysqli_real_escape_string($dbhandle,$_GET['id']) ;

    // Excluir candidato
    $sql = "DELETE FROM `candidatos` WHERE `id` = ".$id.";" ;

    if (mysqli_query($dbhandle, $sql)) {
        echo "<script>alert('Candidato excluido com sucesso!'); </script>";
        echo '<div class="alert alert-info" role="alert"><br>Usuário excluido com sucesso!<br> <a href="#" onclick="location.reload();" >Atualizar lista</a> </div>';
    } else {
        echo "<script>alert('Error deleting record:'); </script>" . mysqli_error($dbhandle);
    }
    $dbhandle->close();
}
?>