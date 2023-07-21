<?php
include('restrito.php');
//include('inc/conexao.php');

if ((isset($_POST['id'])) && ($_POST['id'] != "")){
    
    // Tenta se conectar ao servidor MySQL
    $dbhandle = mysqli_connect('db', 'votacao', 'voto2020') or trigger_error(mysqli_error($dbhandle));
    // $dbhandle = mysqli_connect('localhost', 'root', '') or trigger_error(mysqli_error($dbhandle));
    // Tenta se conectar a um banco de dados MySQL
    mysqli_select_db($dbhandle, 'consulta_voto') or trigger_error(mysqli_error($dbhandle));

    //$titulo = mysqli_real_escape_string($dbhandle, $_POST['titulo']);
    $nome_usuario = mysqli_real_escape_string($dbhandle,$_POST['nome_usuario']);
    $login_usuario = mysqli_real_escape_string($dbhandle,$_POST['login_usuario']);
    $email_usuario = mysqli_real_escape_string($dbhandle,$_POST['email_usuario']);
    $ativo_usuario = mysqli_real_escape_string($dbhandle,$_POST['usuario_ativo']);
    $escola_usuario = mysqli_real_escape_string($dbhandle,$_POST['escola_usuario']);
    $senha_usuario = mysqli_real_escape_string($dbhandle,$_POST['senha_usuario']);
    $id_usuario =  mysqli_real_escape_string($dbhandle,$_POST['id']);
    $sqlSenha = "";
    if($senha_usuario != ""){
        $sqlSenha = ', senha= "'.SHA1($senha_usuario).'"';
    }
    // Validação do usuário/senha digitados
    $sql = "UPDATE `usuarios` SET nome = '".$nome_usuario."', usuario = '".$login_usuario."', email= '".$email_usuario."', ativo=".$ativo_usuario.", escola='".$escola_usuario."' ". $sqlSenha."   WHERE `id` = ".$id_usuario;

    if ($dbhandle->query($sql) === TRUE) {
      //  echo "Record updated successfully";
      //  echo "<script>alert('Cadastro atualizado com sucesso!'); </script>"; 
        header("Location: form-edita-usuario.php?id=".$id_usuario."&ok=1");exit;
    } else {
        echo "Error updating record: " . $dbhandle->error;
    }
    mysqli_close($dbhandle);
}else{

}
?>

