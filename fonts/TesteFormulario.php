<?php
include('header.php');
include('sidebar.php');
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-arrow-circle-o-left"></i> Selecione uma opção</h3>
          </div>
        </div>
        <!-- page start-->
        <form class="form-validate form-horizontal" id="atualiza_voto" method="post" action="testeAtualiza.php" enctype="multipart/form-data" >
        <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">    
                  <div class="file-upload-wrapper">
                  <input type="file" class="form-control-file" id="foto_eleitor" data-max-size="2000" name="foto_eleitor"><br>
                  <button type="submit" class="btn btn-success" id="confirmar-voto" >Confirmar voto</button>
                  </div>
                </div>
              </div>  
        </form> 
        <!--Page content goes here-->
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
<?php
include('footer.php');
?>