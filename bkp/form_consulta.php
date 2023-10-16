<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cesta Básica</title>
</head>

<body>
  <?php
  include('inc/header.php');
  include('inc/sidebar.php');
  $id_ususario = $_SESSION['UsuarioID'];
  if ((isset($_GET['msg'])) && ($_GET['msg'] == 1)) {
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
          <section class="panel" id="section-buscar">
            <header class="panel-heading">
              Consultar Servidor
            </header>
            <div class="panel-body">
              <form class="form-validate form-horizontal col" id="form_consulta" style="display:block;">
                <div class="form-group col" id="label-busca">
                  <label class="col-sm-2 control-label"> <span style="color:#ff0000!important;">*</span> Número do CPF</label>
                  <div class="col-sm-4">
                    <input type="number" class="form-control col-sm-6" id="titulo" name="titulo" placeholder="CPF - Só números" required="required">
                  </div>
                </div>
                <div class="form-group col" id="label-busca">
                  <label class="col-sm-2 control-label"><span style="color:#ff0000!important;">*</span>Matrícula</label>
                  <div class="col-sm-4">
                    <input type="number" class="form-control col-sm-6" id="matric" name="matric" placeholder="Matrícula" required="required">
                  </div>
                </div>

                <div class="form-group col" id="label-busca">
                  <label class="col-sm-2 control-label"><span style="color:#ff0000!important; border: none;">*</span>Mês (atual padrão)</label>
                  <div class="col-sm-2">
                      <select id="mes" name="mes" class="form-control col-sm-6">
                        <option value="1" <?php if (date("n") === "1") echo "selected"; ?>>Janeiro</option>
                        <option value="2" <?php if (date("n") === "2") echo "selected"; ?>>Fevereiro</option>
                        <option value="3" <?php if (date("n") === "3") echo "selected"; ?>>Março</option>
                        <option value="4" <?php if (date("n") === "4") echo "selected"; ?>>Abril</option>
                        <option value="5" <?php if (date("n") === "5") echo "selected"; ?>>Maio</option>
                        <option value="6" <?php if (date("n") === "6") echo "selected"; ?>>Junho</option>
                        <option value="7" <?php if (date("n") === "7") echo "selected"; ?>>Julho</option>
                        <option value="8" <?php if (date("n") === "8") echo "selected"; ?>>Agosto</option>
                        <option value="9" <?php if (date("n") === "9") echo "selected"; ?>>Setembro</option>
                        <option value="10" <?php if (date("n") === "10") echo "selected"; ?>>Outubro</option>
                        <option value="11" <?php if (date("n") === "11") echo "selected"; ?>>Novembro</option>
                        <option value="12" <?php if (date("n") === "12") echo "selected"; ?>>Dezembro</option>
                      </select>
                  </div>
                </div>

                <div class="form-group" id="botao-busca">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-10">
                    <div class="btn btn-primary" id="buscar">Consultar</div>
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