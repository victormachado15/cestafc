<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cesta de Natal</title>
</head>
<body>
<?php
include('inc/header.php');
include('inc/sidebar.php');
$id_ususario = $_SESSION['UsuarioID']; 
if ((isset($_GET['msg'])) && ($_GET['msg'] == 1)){
  echo "<script>alert('Registro atualizado com sucesso!'); </script>"; 
}
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <!--Resultado da busca-->
          <div id="resultado" class="resultado"> </div>  
          <!--Formulário da busca-->
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Consultar Funcionário
              </header>
              <div class="panel-body">
              <form class="form-validate form-horizontal col" id="form_consulta" style="display:block;">
                  <div class="form-group col" id="label-busca" >
                    <label class="col-sm-2 control-label">Número do CPF</label>
                    <div class="col-sm-4">
                      <input type="number" class="form-control col-sm-6" id="titulo" name="titulo" placeholder="CPF" required="required">
                    </div>
                  </div>       
                  <div class="form-group col" id="label-busca" >
                    <label class="col-sm-2 control-label">Matrícula</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control col-sm-6" id="matric" name="matric" placeholder="Matrícula" required="required">
                    </div>
                  </div>
                  <div class="form-group" id="botao-busca">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                    <div  class="btn btn-primary" id="buscar">Consultar</div>
                    </div>
                  </div>
                </form>               
              </div>
            </section>
          </div>
        </div>
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->

<?php
include('inc/footer.php');
?>
</body>
</html>
