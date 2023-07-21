<?php
namespace Verot\Upload;
include('inc/restrito.php');
include('inc/class.upload.php');
include('inc/conexao.php');

if ((isset($_POST['cpf'])) && ($_POST['cpf'] != "")){

    // Tenta se conectar a um banco de dados MySQL
    mysqli_select_db($dbhandle, 'consulta_voto') or trigger_error(mysqli_error($dbhandle));
    $id_usuario = mysqli_real_escape_string($dbhandle,$_SESSION['UsuarioID']);  
    $cpf = mysqli_real_escape_string($dbhandle,$_POST['cpf']) ;

    $protocolo = date('dHis');
    $protocolo_int = $id_usuario.intval($protocolo);

    $sql = "UPDATE `eleitor_votacao` SET `votou` = 1, `data_hora` = CURRENT_TIMESTAMP,`registrado_por` = $id_usuario , `protocolo` = $protocolo_int WHERE `cpf` = ".$cpf;

    if ($dbhandle->query($sql) === TRUE) {

        echo' <div style="text-align:center;"><br>Registrado com sucesso! <br><br> <h3>PROTOCOLO: '.$protocolo_int.'</h3></br>';
        echo '<a href="form_consulta" class="btn btn-primary" style=" font-size: 14px; text-align: center; vertical-align: middle; cursor: pointer; text-decoration:none; border: 1px solid transparent; border-radius: 4px;    display: inline-block;  padding: 6px 12px;   color: #ffffff; background-color: #007aff; border-color: #007aff;">Nova consulta</a> <div>';
         //header("Location: form_consulta?msg=1");exit;
       
    } else {
        echo "Error updating record: " . $foo->error ." <br>".$sql;
    }
    
   
}else{

}

?>