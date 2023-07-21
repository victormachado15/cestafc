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
          
          <!--Formulário da busca-->
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Consultar eleitor por Nome
               </header>
              <div class="panel-body">
              <form class="form-validate form-horizontal" id="form_consulta" style="display:block;">
                  <div class="form-group" id="label-busca">
                    <label class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10">
                     <!-- <input type="number" class="form-control col-sm-6" id="titulo" name="titulo" placeholder="Buscar" required>
                  Pesquisar: -->
			        <input type="text" name="pesquisa" id="pesquisa" class="form-control col-sm-6" placeholder="Digite o nome e aguarde">
                    </div>
                  </div>   
                  <!--   <div class="form-group" id="botao-busca">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                    <input type="submit" name="enviar" value="Pesquisar" class="btn btn-primary">
            <div  class="btn btn-primary" id="buscar">Consultar</div>
                    </div>
                  </div>-->
                </form>               
              </div>
            </section>
          </div>
          <!--Resultado da busca-->
          <div id="resultado" class="resultado"> </div>  


        </div>
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->

<?php
include('inc/footer.php');
?>