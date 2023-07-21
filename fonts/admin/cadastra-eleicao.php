<?php
include('header.php');
include('sidebar.php');
include('inc/conexao.php');
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">
               Cadastro de Eleicao
            </header>
            <div class="panel-body">
            <!-- <h3 class="page-header"><i class="fa fa-arrow-circle-o-left"></i> Selecione uma opção</h3>-->
            <br>
                <?php
                if ((isset($_POST['eleicao'])) && ($_POST['eleicao'] != "")){
                    //$dbhandle = mysqli_connect('localhost', 'root', '') or trigger_error(mysqli_error($dbhandle));
                    mysqli_select_db($dbhandle, 'consulta_voto') or trigger_error(mysqli_error($dbhandle));

                    $eleicao  = mysqli_real_escape_string($dbhandle,$_POST['eleicao']) ;
                    $data_eleicao = mysqli_real_escape_string($dbhandle,$_POST['data_eleicao']) ;
                    $obs_eleicao = mysqli_real_escape_string($dbhandle,$_POST['obs_eleicao']) ;
                    $loginOk = false;
 
                    $msgErr = "";

                    $sql_Login = 'SELECT * FROM `config` WHERE `eleicao` = "'.$eleicao.'" AND `data-eleicao` = "'.$data_eleicao.'";';
                    $sql_Log= mysqli_query($dbhandle, $sql_Login);
                    if (mysqli_num_rows($sql_Log) > 0) {
                        $loginOk = true;
                        $msgErr .=  '<i class="fa fa-exclamation-triangle" style="color:#FF4500;" aria-hidden="true"></i> A votação '.$eleicao.' já esta cadastrada em '.$data_eleicao.'! ';
                    }
                    if($loginOk === false ){
                        $sql=" INSERT INTO `config` VALUES ('".$eleicao."', '".$data_eleicao."', '".$obs_eleicao."');"; 
                        if ($dbhandle->query($sql) === TRUE) {
                            echo "Cadastro realizado com sucesso";
                        } else {
                            echo "Error updating record: <br>" . $dbhandle->error ."<br>". $sql;
                        }
                        $dbhandle->close();
                    }else{
                        echo $msgErr;  
                        echo '<br><a href ="form-cadastra-eleicao.php" > Voltar</a> <br>';
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