<?php
include('header.php');
include('sidebar.php');
$hoje = date("Y-m-d");
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
               Cadastro de Votação
              </header>
              <div class="panel-body">
                <form class="form-horizontal" method="post" action="cadastra-eleicao.php">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nome Votação*</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control col-sm-6" name="eleicao" maxlength="298" title="Caso necessário, abrevie o nome. Máximo de 50 caracteres" required >
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Data*</label>
                    <div class="col-sm-10">
                      <input type="date" id="start" name="data_eleicao" value="2018-07-22" min="<?php echo $hoje; ?>">
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Observação*</label>
                    <div class="col-sm-10">
                      <textarea id="story" name="obs_eleicao" rows="5" cols="200"></textarea>
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

