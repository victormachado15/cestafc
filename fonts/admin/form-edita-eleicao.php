<?php
include('header.php');
include('sidebar.php');
include('inc/conexao.php');
if ((isset($_GET['ok'])) && ($_GET['ok'] == 1)){
    echo "<script>alert('Cadastro atualizado com sucesso!'); </script>"; 
}
    // Tenta se conectar ao servidor MySQL
    //$dbhandle = mysqli_connect('db', 'votacao', 'voto2020') or trigger_error(mysqli_error($dbhandle));
    // $dbhandle = mysqli_connect('localhost', 'root', '') or trigger_error(mysqli_error($dbhandle));
    // Tenta se conectar a um banco de dados MySQL
    mysqli_select_db($dbhandle, 'consulta_voto') or trigger_error(mysqli_error($dbhandle));
  
    // Validação do usuário/senha digitados
    $sql = "SELECT * FROM `config` WHERE id_eleicao = 0 LIMIT 1";
    $query = mysqli_query($dbhandle, $sql);
    if (mysqli_num_rows($query) != 1) {
        echo "<h4>Votação não encontrada! <h4>" ;
        echo '<div>';
    } else {
        // Salva os dados encontrados na variável $resultado
        $resultado = mysqli_fetch_assoc($query);
        $eleicao = $resultado['eleicao'];
        $data_eleicao = $resultado['data_eleicao'];
        $obs_eleicao = $resultado['obs_eleicao'];
        // if($ativo_usuario == 1){ 
        //     $ativo = "selected"; 
        // }else{
        //     $inativo ="selected";
        // }
    }
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
                <form class="form-horizontal" method="post" action="atualiza-eleicao.php">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nome Votação*: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control col-sm-6" name="eleicao" value="<?php echo $eleicao ?>" maxlength="300"  required >
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Data Votação: </label>
                    <div class="col-sm-10">
                <input type="date" id="start" name="data_eleicao" value="<?php echo $data_eleicao ?>" min="<?php echo $hoje; ?>" required>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Observação*</label>
                    <div class="col-sm-10">
                      <textarea id="story" name="obs_eleicao" class="form-control "  rows="5" cols="60" required> <?php echo $obs_eleicao?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-success">Atualizar</button>
                    </div>
                  </div>
                  <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
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

