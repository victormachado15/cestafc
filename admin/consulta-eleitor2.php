<?php
include('header.php');
include('sidebar.php');


if ((isset($_POST['titulo'])) && ($_POST['titulo'] != "")){
    $titulo = mysqli_real_escape_string($_POST['titulo']) ;
    // Tenta se conectar ao servidor MySQL
    $dbhandle = mysqli_connect('localhost', 'root', '') or trigger_error(mysqli_error($dbhandle));
    // Tenta se conectar a um banco de dados MySQL
    mysqli_select_db($dbhandle, 'consulta_voto') or trigger_error(mysqli_error($dbhandle));

    //$titulo = mysqli_real_escape_string($dbhandle, $_POST['titulo']);

    // Validação do usuário/senha digitados
    $sql = "SELECT `nome-eleitor`, `cpf`, `zona`, `votou` FROM `eleitores-votacao` WHERE (`cpf` = '".$titulo ."') LIMIT 1";
    $query = mysqli_query($dbhandle, $sql);
    if (mysqli_num_rows($query) != 1) {
        // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
       // echo "<script>alert('Login inválido'); </script>"; 
        header("Location: login.php");exit;
      } else {
        // Salva os dados encontrados na variável $resultado
        $resultado = mysqli_fetch_assoc($query);
        $nome_eleitor = $resultado['nome-eleitor'];
        $incricao = $resultado['cpf'];
        $zona = $resultado['zona'];
        $votou = $resultad['votou'];
        if($votou == 1){
            $msg_voto = "O eleitor já votou!";
            $css_votou = "alert-success";
        }else{
            $msg_voto = "O eleitor ainda não votou!";
            $css_votou = "alert-warning";
        }
        mysqli_close($dbhandle);
      
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">

        <section class="panel">
          <header class="panel-heading">
            Consultar eleitor
          </header>
          <div class="panel-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Número do título</label>
                <div class="col-sm-10">
                <div class="alert alert-success" role="alert">
                    '.$incricao.'
                 </div>
                </div>
              </div>  
              <div class="form-group">
                <label class="col-sm-2 control-label">Nome Completo</label>
                <div class="col-sm-10">
                    '.$nome_eleitor.'
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
              <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-success">Nova consulta</button>
                </div>
              </div>
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