<?php
namespace Verot\Upload;
include('inc/restrito.php');
include('inc/class.upload.php');
include('inc/conexao.php');

if ((isset($_POST['cpf'])) && ($_POST['cpf'] != "")){

    // Tenta se conectar a um banco de dados MySQL
    mysqli_select_db($dbhandle, 'cesta_fundacao') or trigger_error(mysqli_error($dbhandle));
    $id_servidor = mysqli_real_escape_string($dbhandle,$_POST['id_servidor']);
    $id_usuario = mysqli_real_escape_string($dbhandle,$_SESSION['UsuarioID']);  //registrado_por
    // $cpf = mysqli_real_escape_string($dbhandle,$_POST['cpf']) ;
    //tratamento para gerar protocolo
    $protocolo = date('dHis');
    $protocolo_int = $id_usuario.intval($protocolo);
    $retirado_por = $_POST['pessoaretira'];
    $mes_cesta = $_POST['mes_cesta'];
    //atualiza valor do último recebido
    $mes_cesta = $mes_cesta + 1;

 /*  $sql = "UPDATE `cestas_entrega` SET `recebeu` = 1, `data_hora` = CURRENT_TIMESTAMP,`registrado_por` = $id_usuario , `protocolo` = $protocolo_int WHERE `cpf` = '".$cpf."'";*/

//    $sql = "UPDATE `cestas_entrega` SET `recebeu` = 1, `data_hora` = CURRENT_TIMESTAMP,`registrado_por` = $id_usuario , `protocolo` = $protocolo_int, `retirado_por` = '$pessoaretira' WHERE `cpf` = '".$cpf."'"; 
    $sql = "INSERT INTO cestas_entrega2023 (id_servidor, registrado_por, data_hora, protocolo, retirado_por, mes_cesta) 
            VALUES ('$id_servidor', '$id_usuario', CURRENT_TIMESTAMP, '$protocolo_int', '$retirado_por', '$mes_cesta')";

        if ($dbhandle->query($sql) === TRUE) {
            //precisa disso de novo?
            // $protocolo = date('dHis');
            // $protocolo_int = intval($protocolo);
            // Verifica se cadastrou foto
           /*  if ( is_uploaded_file( $_FILES["foto-cesta"]["tmp_name"] ) && $_FILES["foto-cesta"]["error"] === 0 ) {
                $foo = new upload($_FILES['foto-cesta']); 
                if ($foo->uploaded) { 
                   
                    // save uploaded image with a new name, resized to 1000px wide
                    $foo->file_overwrite = true;
                    $foo->image_resize = true;
                    $foo->image_x = 1000;
                    $foo->image_ratio_y = true;
                    $ext = $foo->file_src_name_ext;
                    $foo->file_new_name_body = "foto-".$protocolo_int;
                    $foo->process('uploads/fotos/');
                    if ($foo->processed) {

                        $salva_arquivo = "foto-".$protocolo_int.".".$ext;

                        //=======> TABELA dados_cesta ID, ID (da pessoa), foto, id (registrado por), 
                      
                        $sql_cadastra = "UPDATE `eleitor_votacao` SET `foto` = 'uploads/fotos/$salva_arquivo' WHERE `cpf` = '".$cpf."'";
                        if ($dbhandle->query($sql_cadastra) === TRUE) {
                          //  echo "<script LANGUAGE='JavaScript'> window.alert('Registrado!'); 
                          //  window.history.back(-2); </script>"; */
                          echo' <div style="text-align:center;"><br>Registrado com sucesso! <br><br> <h3>PROTOCOLO: '.$protocolo_int.'</h3></br>';
                          echo '<a href="form_consulta" class="btn btn-primary" style=" font-size: 14px; text-align: center; vertical-align: middle; cursor: pointer; text-decoration:none; border: 1px solid transparent; border-radius: 4px;    display: inline-block;  padding: 6px 12px;   color: #ffffff; background-color: #007aff; border-color: #007aff;">Nova consulta</a> <div>';
                           //header("Location: form_consulta?msg=1");exit;

                //         }
                //         $foo->clean();
                //     } else {
                //         echo 'error : ' . $foo->error;
                //     } 
                // }

             }else{
                    
                    echo "<script LANGUAGE='JavaScript'> window.alert('Não foi possivel registrar! Tente novamente.'); 
                        </script>";
                // } echo "Error updating record: " . $dbhandle->error;
                echo "Error updating record: " . $dbhandle->error;
             }
                
        } else {
           
        }   




