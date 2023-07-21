<?php
include('header.php');
include('sidebar.php');
//include('inc/conexao.php');
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">
               Cadastro de Usuário
            </header>
            <div class="panel-body">
            <!-- <h3 class="page-header"><i class="fa fa-arrow-circle-o-left"></i> Selecione uma opção</h3>-->
            <br>
                <?php
                if ((isset($_POST['login_usuario'])) && ($_POST['login_usuario'] != "")){
                    $dbhandle = mysqli_connect('db', 'votacao', 'voto2020') or trigger_error(mysqli_error($dbhandle));
                    //$dbhandle = mysqli_connect('localhost', 'root', '') or trigger_error(mysqli_error($dbhandle));
                    mysqli_select_db($dbhandle, 'consulta_voto') or trigger_error(mysqli_error($dbhandle));
                    // echo"<pre>";
                    // print_r($_POST);
                    // echo"</pre>";
                    //echo "<br>".  
                    $nome_usuario  = mysqli_real_escape_string($dbhandle,$_POST['nome_usuario']) ;
                    $login_usuario = mysqli_real_escape_string($dbhandle,$_POST['login_usuario']) ;
                    $escola_usuario = mysqli_real_escape_string($dbhandle,$_POST['escola_usuario']) ;
                    $senha_usuario = SHA1(mysqli_real_escape_string($dbhandle,$_POST['senha_usuario'])) ;
                    $email_usuario = mysqli_real_escape_string($dbhandle,$_POST['email_usuario']) ;
                    $loginOk = false;
                    $emailOk = false;
                    $msgErr = "";

                    $sql_Login = 'SELECT * FROM `usuarios` WHERE `usuario` = "'.$login_usuario.'";';
                    $sql_Log= mysqli_query($dbhandle, $sql_Login);
                    if (mysqli_num_rows($sql_Log) > 0) {
                        $loginOk = true;
                        $msgErr .=  '<i class="fa fa-exclamation-triangle" style="color:#FF4500;" aria-hidden="true"></i> O login já consta registrado! <br> Cadastre outro login. <br> ';
                    }
                    $sql_email = 'SELECT * FROM `usuarios` WHERE `email` = "'.$email_usuario.'";';
                    $sql_mail = mysqli_query($dbhandle, $sql_email);
                    if (mysqli_num_rows($sql_mail) > 0) {
                        $emailOk = true;
                        $msgErr .=  '<i class="fa fa-exclamation-triangle" style="color:#FF4500;" aria-hidden="true"></i> O e-mail já consta registrado! <br> Cadastre outro email. <br>'; 
                    }
                    if(($loginOk === false ) && ($loginOk === false )){
                        $sql=" INSERT INTO `usuarios` VALUES (NULL, '".$nome_usuario."', '".$login_usuario."', '".$senha_usuario."', '".$email_usuario."','".$escola_usuario."',  1, 1, NOW( ));"; 
                        if ($dbhandle->query($sql) == TRUE) {
                            echo '<div class="alert alert-success" role="alert">Cadastro realizado com sucesso</div>';
                            echo '<br><a href="form-cadastra-usuario.php" class="btn btn-primary btn-sm" >Cadastrar Usuário</a>  ';
                        } else {
                            echo "Error updating record: " . $dbhandle->error;
                        }
                        $dbhandle->close();
                    }else{
                        echo $msgErr;  
                        echo '<br><a href ="form-cadastra-usuario.php" > Voltar</a> <br>';
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