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
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="icon_document_alt"></i>Forms</li>
              <li><i class="fa fa-file-text-o"></i>Form elements</li>
            </ol>-->
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
               Cadastro de Candidato
              </header>
              <div class="panel-body">
                <form class="form-horizontal" method="post" action="cadastra-candidato.php" enctype="multipart/form-data" >
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nome Completo</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control col-sm-6" name="nome" required >
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Partido</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control col-sm-6" name="partido" title="Nome do partido" required>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Sigla do Partido</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control col-sm-6" name="sigla" title="Sigla do partido" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Número</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control col-sm-6" name="numero" required title="Número " >
                    </div>
                  </div>      
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Foto</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control-file" id="foto" data-max-size="2000" name="foto" required>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
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
