<?php
// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
date_default_timezone_set('America/Sao_Paulo');
include_once('inc/conexao.php');
include('inc/header.php');
include('inc/sidebar.php');
$total_entregue = 0;
// Puxando dados do Banco de dados
mysqli_select_db($dbhandle, 'cesta_fundacao') or trigger_error(mysqli_error($dbhandle));
 $sql1 = "SELECT COUNT(*) as ttl_retirou FROM `cestas_entrega` WHERE `recebeu` = 1";
 $query1 = mysqli_query($dbhandle, $sql1);
 $dados= mysqli_fetch_assoc($query1);
     $total_entregue = $dados['ttl_retirou'];

$sql2 = "SELECT COUNT(*) as `ttl_Nretirou` FROM `cestas_entrega` WHERE `recebeu` = 0";
$query2 = mysqli_query($dbhandle, $sql2);
$resultado2 = mysqli_fetch_assoc($query2);
$total_N_entregue = $resultado2['ttl_Nretirou'];

?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
      <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header text-center"><strong>Totais em: <?=date("d/m/Y H:i:s");?></strong></h3>

          </div>
        </div>
      <div class="row">
          <div class="col-lg-2"></div>
          <div class="col-lg-4">
          <div class="alert alert-success text-center" role="alert">
            <h3> Cestas retiradas</h3>
            <h2><strong><?=$total_entregue;?></strong></h2>
          </div>
          </div>
          <div class="col-lg-4">
          <div class="alert alert-warning text-center" role="alert">
          <h3> Cestas não retiradas</h3>
            <h2><strong><?=$total_N_entregue;?></strong></h2>
           <!-- <?=$dados['ttl_Nretirou'];?>-->
          </div>
          </div>
          <div class="col-lg-2"></div>
        </div>  
      
        <div class="row">
        <div class="col-lg-1">
        </div>
        <div class="col-lg-8">
              <h3>Entrega de Cesta Básica para Funcionário</h3>
            <p class="paragrafo">- Para realizar a Entrega da cesta, siga os passos</p>
               
            <p class="paragrafo">
                <ol>
                  <li>Pesquise o funcionário por número de documento</li>
                  <li>No formulário com os dados, Selecione Entregar e depois confirme</li>
                </ol>
              </p>

          </div>
        </div>
        <!-- page starrt-->
        <!--Page content goes here-->
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
<?php
include('inc/footer.php');
?>