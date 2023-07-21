<?php
include('restrito.php');
if ((isset($_GET['titulo'])) && ($_GET['titulo'] != "")){
    
    // Tenta se conectar ao servidor MySQL
    $dbhandle = mysqli_connect('localhost', 'root', '') or trigger_error(mysqli_error($dbhandle));
    // Tenta se conectar a um banco de dados MySQL
    mysqli_select_db($dbhandle, 'consulta_voto') or trigger_error(mysqli_error($dbhandle));

    $titulo = mysqli_real_escape_string($dbhandle,$_GET['titulo']) ;
    // Validação do usuário/senha digitados
    $sql = "SELECT `nome_eleitor`, `cpf`, `zona`, `votou` FROM `eleitores_votacao` WHERE `cpf` = ".$titulo ." LIMIT 1";
    $query = mysqli_query($dbhandle, $sql);
    if (mysqli_num_rows($query) != 1) {
        // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
       // echo "<script>alert('Login inválido'); </script>"; 
        //header("Location: login.php");exit;
        echo '<div class="alert alert-danger " role="alert">';
        echo "<h4>Eleitor não encontrado! <br> Verifique o número digitado.<h4>" ;
        echo '<div>';
      } else {
        // Salva os dados encontrados na variável $resultado
        $resultado = mysqli_fetch_assoc($query);
        $nome_eleitor = $resultado['nome_eleitor'];
        $incricao = $resultado['cpf'];
        $zona = $resultado['zona'];
        $votou = $resultado['votou'];
        if($votou == 1){
            $msg_voto = "O eleitor já votou!";
            $css_votou = "alert-success";
            $esconde_botao = 'style="display:none;"';
        }else{
            $msg_voto = "O eleitor ainda não votou!";
            $css_votou = "alert-warning ";
            $esconde_botao = '';
        }
        mysqli_close($dbhandle);
        echo '
        <div class="col-lg-12">
        <section class="panel"  >
         <header class="panel-heading">
            Resultado da busca
          </header>
          <div class="panel-body">
          <form class="form-validate form-horizontal" id="atualiza_voto" method="post" action="atualiza-eleitor.php" onSubmit="return confirm(\'Confirmar voto de: '.$nome_eleitor.'. \nPortador do titulo: '.$incricao.'\');"> 
              <div class="form-group">
                <label class="col-sm-2 control-label">Nome Completo</label>
                <div class="col-sm-10">
                <input type="text" class="form-control col-sm-6" id="nome_eleitor" value="'.$nome_eleitor.'" name="nome_eleitor" readonly>
                <!-- <div class="alert '.$css_votou.'" role="alert">
                    '.$nome_eleitor.'
                    </div> -->
                </div>
              </div>  
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Número do título</label>
                <div class="col-sm-10">
                <input type="text" class="form-control col-sm-6" id="cpf" value="'.$incricao.'" name="cpf" readonly>
                <!-- <div class="alert '.$css_votou.'" role="alert">
                    '.$incricao.'
                 </div>-->
                </div>
              </div>  
              
              <div class="form-group">
              <label class="col-sm-2 control-label">Zona Eleitoral</label>
              <div class="col-sm-10">
              <input type="text" class="form-control col-sm-6" id="zona" value="'.$zona.'" name="zona" readonly>
              <!--<div class="alert '.$css_votou.'" role="alert">
              '.$zona.'
              </div>-->
              </div>
            </div>   
              <div class="form-group">
                <label class="col-sm-2 control-label">Já votou?</label>
                <div class="col-sm-10">
                <div class="alert '.$css_votou.'" role="alert">
                '.$msg_voto.'
                </div>
                </div>
              </div>      

              <!--<div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10 alert '.$css_votou.'" role="alert">    
                      '.$msg_voto.'
                </div>
              </div>  -->

              <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-5">
                    <!--<button type="submit" class="btn btn-primary">Nova consulta</button>-->
                    <a href="form_consulta.php" class="btn btn-primary">Nova consulta</a>
                </div>
                <div class="col-sm-5">
                    <button type="submit" class="btn btn-success" id="confirmar-voto"'.$esconde_botao.' >Confirmar voto</button>
                </div>
              </div>
            </form>
          </div>
        </section>
      </div><br>  
';
 }

}
?>