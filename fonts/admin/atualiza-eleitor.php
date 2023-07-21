<?php
include('restrito.php');

if ((isset($_POST['cpf'])) && ($_POST['cpf'] != "")){

    // Tenta se conectar ao servidor MySQL
    $dbhandle = mysqli_connect('localhost', 'root', '') or trigger_error(mysqli_error($dbhandle));
    // Tenta se conectar a um banco de dados MySQL
    mysqli_select_db($dbhandle, 'consulta_voto') or trigger_error(mysqli_error($dbhandle));

    //$titulo = mysqli_real_escape_string($dbhandle, $_POST['titulo']);
    $cpf = mysqli_real_escape_string($dbhandle,$_POST['cpf']) ;

    // Validação do usuário/senha digitados
    $sql = "UPDATE `eleitores_votacao` SET `votou` = 1 WHERE `cpf` = ".$cpf;

    if ($dbhandle->query($sql) === TRUE) {
        echo "Record updated successfully";
        echo "<script>alert('Cadastro atualizado com sucesso!'); </script>"; 
        header("Location: blank.php");exit;
    } else {
        echo "Error updating record: " . $dbhandle->error;
    }
    mysqli_close($dbhandle);
}else{

}

?>

