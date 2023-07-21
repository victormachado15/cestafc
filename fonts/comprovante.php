<?php

$dbhandle = mysqli_connect('db', 'votacao', 'voto2020') or trigger_error(mysqli_error($dbhandle));
mysqli_select_db($dbhandle, 'consulta_voto') or trigger_error(mysqli_error($dbhandle));

if ((isset($_GET['cpf'])) && ($_GET['cpf'] != "")){
   $titulo = mysqli_real_escape_string($dbhandle,$_GET['cpf']);
    $eleitor_crpt  = md5($titulo);

               $sqlv = "SELECT * FROM `voto` WHERE id_eleitor = '".$eleitor_crpt."'";
                  $queryv = mysqli_query($dbhandle, $sqlv);
                  if (mysqli_num_rows($queryv) > 0) {
                    $resultado      = mysqli_fetch_assoc($queryv);
                    $protocolo_v   = $resultado['protocolo'];
                    $data_hora_v   = date('d/m/Y H:i:s', strtotime($resultado['data_hora']));

                   // $data_v = $data_hora_v->format("d/m/Y H:i:s ");
                  $sql = "SELECT `nome_eleitor` FROM `eleitor_votacao` WHERE `cpf` = ".$titulo ." LIMIT 1";

                  $query = mysqli_query($dbhandle, $sql);
                  if (mysqli_num_rows($query) != 1) {
                      // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
                    } else {
                      // Salva os dados encontrados na variável $resultado
                      $resultado      = mysqli_fetch_assoc($query);
                      $nome_eleitor   = $resultado['nome_eleitor'];
                      $msg_voto = "<br>Eleitor: <strong>".$nome_eleitor."</strong> <br> Documento: <strong>".$titulo." </strong> <br> Em: <strong>". $data_hora_v."</strong>";
                     
                    }
                  $dbhandle->close();

                  } else {
                    echo "Error updating record: " . $dbhandle->error;
                    $dbhandle->close();
                  }

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistema de controle de votação</title>

  <!-- Bootstrap core CSS -->
  <link href="sis-eleitor/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet"  type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="sis-eleitor/css/clean-blog.min.css" rel="stylesheet">

</head>

<body>


  <!-- Main Content -->
  <div class="container">
    <div class="row jumbotron d-flex justify-content-center  vertical-center" style="background-color:#ffffff;">
<div class="col-lg-10 col-md-10 mx-auto">
        <div class="d-flex justify-content-center " >

        
      </div>
      </div>
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="jumbotron d-flex justify-content-center  vertical-center" style="background-color:#ffffff;">
        <!--<h1>FIM</h1>-->




              <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Comprovante de votação</h4>
                <p><?php echo $msg_voto?></p>
                <hr>

                <p class="mb-0 "><strong>Protocolo: <?php echo $protocolo_v ?></strong></p>
              </div> 


      </div>
      </div>
    </div>
  </div>

 

  <!-- Footer -->
  <!--<footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

          <p class="copyright text-muted">Copyright &copy; DTI - PMJ 2021</p>
        </div>
      </div>
    </div>
  </footer>-->

  <!-- Bootstrap core JavaScript -->
  <script src="sis-eleitor/vendor/jquery/jquery.min.js"></script>
  <script src="sis-eleitor/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="sis-eleitor/js/clean-blog.min.js"></script>

</body>

</html>
