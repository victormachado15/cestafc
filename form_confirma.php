<?php
include('header.php');
include('sidebar.php');
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
           <!-- <h3 class="page-header"><i class="fa fa-file-text-o"></i> Form elements</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index">Home</a></li>
              <li><i class="icon_document_alt"></i>Forms</li>
              <li><i class="fa fa-file-text-o"></i>Form elements</li>
            </ol>-->
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Consultar Servidor
              </header>
              <div class="panel-body">
                <form class="form-horizontal " method="get">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Número do CPF ou Matrícula</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control col-sm-6" name="titulo" >
                    </div>
                  </div>  
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nome Completo</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control col-sm-6" name="nome" >
                    </div>
                  </div>      
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Já retirou a Cesta do mês?</label>
                    <div class="col-sm-10">
                    <div class="alert alert-success" role="alert">
                        Servidor Recebeu a Cesta.
                    </div>
                    </div>
                  </div>       
                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-success">Atualizar</button>
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