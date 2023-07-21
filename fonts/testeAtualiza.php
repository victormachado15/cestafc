<?php
namespace Verot\Upload;
include('header.php');
include('sidebar.php');
//include('inc/restrito.php');
include('inc/class.upload.php');
$foo = new upload($_FILES['foto_eleitor']); 
if ($foo->uploaded) { 
    // save uploaded image with a new name,
    // resized to 1000px wide
    $foo->file_new_name_body = 'foto';
    $foo->file_overwrite = true;
    $foo->image_resize = true;
    $foo->image_x = 1000;
    $foo->image_ratio_y = true;
    $foo->process('uploads/img/');
    $extencao = $foo->file_src_name_ext;
    if ($foo->processed) {
        echo "<img src='uploads/img/foto.jpg' />";
    }
    echo"<div>".$extencao."<div><hr>";
    echo $foo->log;
    $foo->clean();
} else {
    echo 'error : ' . $foo->error;
} 
 
//$foo->close();

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
                  <input type="file" class="form-control-file" id="foto_eleitor" data-max-size="2000" name="foto_eleitor">
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