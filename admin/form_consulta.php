<?php
include('header.php');
include('sidebar.php');
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!-- <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Form elements</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
              <li><i class="icon_document_alt"></i>Consultar eleitor</li>
            </ol>
          </div>
        </div> -->
        <div class="row">
          <!--Resultado da busca-->
          <div id="resultado" class="resultado"> </div>  
          <!--Formulário da busca-->
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Consultar eleitor
              </header>
              <div class="panel-body">
              <form class="form-validate form-horizontal" style="display:block;">
                  <div class="form-group" id="label-busca">
                    <label class="col-sm-2 control-label">Número do título</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control col-sm-6" id="titulo" name="titulo" placeholder="Buscar" required>
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
include('footer.php');
?>