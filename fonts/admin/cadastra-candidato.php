<?php
namespace Verot\Upload;
include('inc/class.upload.php');
include('header.php');
include('sidebar.php');


?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">
               Cadastro de Candidato
            </header>
            <div class="panel-body">
            <!-- <h3 class="page-header"><i class="fa fa-arrow-circle-o-left"></i> Selecione uma opção</h3>-->
            <br>
                <?php
                if ((isset($_POST['nome'])) && ($_POST['nome'] != "")){
                    $dbhandle = mysqli_connect('localhost', 'id13390035_votacao2020', '$enh@_DTI2020') or trigger_error(mysqli_error($dbhandle));
mysqli_select_db($dbhandle, 'id13390035_consulta_voto') or trigger_error(mysqli_error($dbhandle));
//$dbhandle = mysqli_connect('localhost', 'root', 'root') or trigger_error(mysqli_error($dbhandle));
//mysqli_select_db($dbhandle, 'votacao') or trigger_error(mysqli_error($dbhandle));

                    $nome  = mysqli_real_escape_string($dbhandle,$_POST['nome']) ;
                    $partido = mysqli_real_escape_string($dbhandle,$_POST['partido']) ;
                    $sigla = mysqli_real_escape_string($dbhandle,$_POST['sigla']) ;
                    $numero = mysqli_real_escape_string($dbhandle,$_POST['numero']) ;
                    //$foto = mysqli_real_escape_string($dbhandle,$_POST['foto']) ;
                    $loginOk = false;
                    $emailOk = false;
                    $msgErr = "";

                    $sql_Login = 'SELECT * FROM `candidatos` WHERE `numero` = "'.$numero.'";';
                    $sql_Log= mysqli_query($dbhandle, $sql_Login);
                    if (mysqli_num_rows($sql_Log) > 0) {
                        $loginOk = true;
                        $msgErr .=  '<i class="fa fa-exclamation-triangle" style="color:#FF4500;" aria-hidden="true"></i> Candidato com o número <strong>'.$numero.'</strong> já consta registrado! <br> Verifique os dados. <br> ';
                    }
                    $sql_email = 'SELECT * FROM `candidatos` WHERE `nome` = "'.$nome.'";';
                    $sql_mail = mysqli_query($dbhandle, $sql_email);
                    if (mysqli_num_rows($sql_mail) > 0) {
                        $emailOk = true;
                        $msgErr .=  '<i class="fa fa-exclamation-triangle" style="color:#FF4500;" aria-hidden="true"></i> O nome <strong>'.$nome.'</strong> já consta registrado! <br> Verifique os dados. <br>'; 
                    }

                    
                    if(($loginOk === false ) && ($emailOk === false )){
                        $sql = " INSERT INTO `candidatos` VALUES (NULL,'".$nome."', '".$partido."', '".$numero."', ' ','".$sigla."',  1,  NOW( ));"; 
                       // echo $sql;
                      
                        if ($dbhandle->query($sql) === TRUE) {
                         

                        //Cria o diretório com o nomero do documento, onde será gravada a foto para reconhecimento;
                        mkdir("candidatos/".$numero, 0700);

                            $foo = new upload($_FILES['foto']); 
                            if ($foo->uploaded) { 
                                // save uploaded image with a new name, resized to 1000px wide
                        //        $foo->file_new_name_body = $cpf;
                                $foo->file_new_name_body = "1";
                                $foo->file_overwrite = true;
                                $foo->image_resize = true;
                                $foo->image_x = 1000;
                                $foo->image_ratio_y = true;
                                $ext = $foo->file_src_name_ext;
                                $foo->process('candidatos/'.$numero);
                                if ($foo->processed) {

                                   // $salva_arquivo = $cpf.".".$ext;
                                    $salva_arquivo = "1.".$ext; // o nome do arquivo ficará 1.jpg
                                   echo "--". $sqli = "UPDATE `candidatos` SET  `foto` = 'candidatos/".$numero."/$salva_arquivo' WHERE `numero` = ".$numero;
                                    if ($dbhandle->query($sqli) === TRUE) {
                                        //header("Location: form_consulta?msg=1");exit;
                                        echo "Foto cadastrada!";
                                    }else{ 
                                        echo "<br> Foto NÃO cadastrada! <br>";
                                    }
                                    $foo->clean();

                                } else {
                                    echo 'error : ' . $foo->error;
                                } 
                            }  

                            echo "Cadastrao realizado com sucesso";
                        } else {
                            echo "Error updating record: " . $dbhandle->error;
                        }

                        $dbhandle->close();
                    }else{
                        echo $msgErr;  
                        echo '<br><a href ="form-cadastra-candidato.php" > Voltar</a> <br>';
                    }
                }else{ }

                ?>
                </div>
            </section>
          </div>
        </div>
        <!-- page start-->
        <!--Page content goes here-->
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
<?php
include('footer.php');
?>