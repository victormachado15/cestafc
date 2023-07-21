<?php
include('restrito.php');
include('inc/conexao.php');

if ((isset($_POST['eleicao'])) && ($_POST['eleicao'] != "")){
    
    // Tenta se conectar ao servidor MySQL
    //$dbhandle = mysqli_connect('db', 'votacao', 'voto2020') or trigger_error(mysqli_error($dbhandle));
    // $dbhandle = mysqli_connect('localhost', 'root', '') or trigger_error(mysqli_error($dbhandle));
    // Tenta se conectar a um banco de dados MySQL
    mysqli_select_db($dbhandle, 'consulta_voto') or trigger_error(mysqli_error($dbhandle));

    //$titulo = mysqli_real_escape_string($dbhandle, $_POST['titulo']);
    $eleicao = mysqli_real_escape_string($dbhandle,$_POST['eleicao']);
    $data_eleicao = mysqli_real_escape_string($dbhandle,$_POST['data_eleicao']);
    $obs_eleicao = mysqli_real_escape_string($dbhandle,$_POST['obs_eleicao']);
    // Validação do usuário/senha digitados
    $sql = "UPDATE `config` SET eleicao = '".$eleicao."', data_eleicao = '".$data_eleicao."', obs_eleicao= '".$obs_eleicao."'  WHERE `id_eleicao` = 0";

    if ($dbhandle->query($sql) === TRUE) {
      //  echo "Record updated successfully";
      //  echo "<script>alert('Cadastro atualizado com sucesso!'); </script>"; 
        header("Location: form-edita-eleicao.php?id=0&ok=1");exit;
    } else {
        echo "Error updating record: " . $dbhandle->error;
    }
    mysqli_close($dbhandle);
}else{

}
?>

