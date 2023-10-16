<?php
session_start();
?>

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

  if (isset($_SESSION['redirect_message'])) {
    echo "<script>alert('{$_SESSION['redirect_message']}');</script>";
    unset($_SESSION['redirect_message']);
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
              Atualizar Ativos
            </header>
            <div class="panel-body">
              <form method="POST" action="processa_excel.php" enctype="multipart/form-data">
                <label>Arquivo: </label>
                <input type="file" name="arquivo" id="arquivo"><br><br>

                <input type="submit">
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