<?php
include('inc/restrito.php');
include('inc/conexao.php');
if ((isset($_GET['ok'])) && ($_GET['ok'] == 1)) {
  echo "<script>alert('Cadastro atualizado com sucesso!'); </script>";
}
if ((isset($_GET['titulo'])) && ($_GET['titulo'] != "")) {

  // Tenta se conectar ao servidor MySQL
  //$dbhandle = mysqli_connect('db', 'root', 'cesta@2020') or trigger_error(mysqli_error($dbhandle));
  // Tenta se conectar a um banco de dados MySQL
  mysqli_select_db($dbhandle, 'cesta_fundacao') or trigger_error(mysqli_error($dbhandle));
  
  echo "<script>alert('obtendo o titulo'); </script>";
  $titulo = mysqli_real_escape_string($dbhandle, $_GET['titulo']);
  //$mes_cesta = $_GET['mes'];
  echo "<script>alert('obtendo o titulo: $titulo'); </script>";
  // Validação do usuário/senha digitados
  //$sql = "SELECT `nome_eleitor`, `cpf`, `zona`, `registrado_por`,`votou`, `data_hora`, `foto`, `protocolo` FROM `eleitor_votacao` WHERE `cpf` = ".$titulo ." LIMIT 1";
  $sql = "SELECT `id`, `nome_servidor`, `cpf`, `matricula`, `registrado_por`,`recebeu`, `data_hora`, `protocolo`, `ultima_recebida` FROM `cestas_entrega` WHERE `cpf` = " . $titulo . " LIMIT 1";
  $query = mysqli_query($dbhandle, $sql);
  if (mysqli_num_rows($query) != 1) {
    // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
    // echo "<script>alert('Login inválido'); </script>"; 
    //header("Location: login.php");exit;
    echo '<div class="alert alert-danger " role="alert">';
    echo "<h4>Funcionário não encontrado! <br> Verifique o número digitado.<h4>";
    echo '<div>';
  } else {
    // Salva os dados encontrados na variável $resultado
    $resultado = mysqli_fetch_assoc($query);
  $nome_eleitor   = $resultado['nome_servidor'];
    $id_servidor   = $resultado['id'];
    $incricao       = $resultado['cpf'];
    $matricula      = $resultado['matricula'];
    $registrado_por = $resultado['registrado_por'];
    $votou          = $resultado['recebeu'];
    $data_hora      = $resultado['data_hora'];
    $ultima = $resultado['ultima_recebida'];
 //   $foto           = $resultado['foto'];
    $protocolo      = $resultado['protocolo'];
   

    $data_entrega = date('d/m/Y H:i', strtotime($data_hora));
    $mes_cesta  = '3';

    //echo $mes_cesta;
                      //obtem o mes
    
    // Verificar se o servidor já recebeu a cesta do mês selecionado
      $sql = "SELECT * FROM cesta_entregue WHERE id = $id_servidor AND ultima_recebida = '$mes_cesta'";
      $result = $dbhandle->query($sql);

    /*  if ($result->num_rows == 0) {
          // Caso não exista, realizar o INSERT na tabela cesta_entregue
          $sql_insert = "INSERT INTO cesta_entregue (id_servidor, cpf, matricula, registrado_por, recebeu, data_hora, foto, protocolo, retirado_por, mes_cesta)
                        VALUES ($id_servidor, '12345678901', '12345', 'Fulano', 1, NOW(), 'caminho_da_foto.jpg', 'ABC123', 'Ciclano', '$mes_cesta')";
          
          if ($dbhandle->query($sql_insert) === TRUE) {
              echo "Registro de entrega inserido com sucesso!";
          } else {
              echo "Erro ao inserir registro: " . $dbhandle->error;
          }
      } else {
          echo "O funcionário já recebeu a cesta do mês selecionado.";
      }
 */
    //if($foto != ""){
    if ($votou != 0 && $ultima == $mes_cesta) {
      $msg_voto = "O funcionário consultado <strong style='color:#333'>Já Retirou a Cesta!</strong>";
      $css_votou = "alert-dark";
      $esconde_botao = 'style="display:none;"';
      $mostrafoto = '';
      $mostraentrega = 'style="display:none; "';
      $sql_usuario = "SELECT `nome`, `local` FROM `usuarios` WHERE `id` = " . $registrado_por;
      $query_usuario = mysqli_query($dbhandle, $sql_usuario);
      if (mysqli_num_rows($query_usuario) != 1) {
        //mensagem usuario nao encontrado. break;
      } else {
        $dados_usuario = mysqli_fetch_assoc($query_usuario);
        $nome_usuario = $dados_usuario['nome'];
        $escola_usuario = $dados_usuario['local'];
        $msg_voto .= "<br> Atualizado por: <strong style='color:#333'>" . $nome_usuario . "</strong> <br><!-- No local: <strong style='color:#333'>" . $escola_usuario . "</strong> <br>--> Em: <strong style='color:#333'>" . $data_entrega . "</strong>";
        $comprovante = '<a href="comprovante.php?cpf=' . $incricao . '" target="_blank" class="btn btn-primary">Comprovante de entrega</a>';
      }
    } else {
      $msg_voto = "O funcionário ainda não retirou a cesta! Ultima retirada no mês: " . $mes_cesta;
      $css_votou = "alert-danger";
      $esconde_botao = '';
      $mostrafoto = 'style="display:none; "';
      $mostraentrega = '';
      $comprovante = '';
    }
    echo '
        <div class="col-lg-12">
        <section class="panel"  >
         <header class="panel-heading">
            Resultado da busca
          </header>
          <div class="panel-body">
          <form class="form-validate form-horizontal" id="atualiza_voto" method="post" action="atualiza-eleitor.php" enctype="multipart/form-data" onSubmit="return confirm(\'Confirmar entrega de cesta de: ' . $nome_eleitor . '. \nPortador do CPF/Documento: ' . $incricao . '\');"> 
              <div class="form-group">
                <label class="col-sm-2 control-label">Nome Completo</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control col-sm-6" id="nome_eleitor" value="' . $nome_eleitor . '" name="nome_eleitor" readonly>
                </div>
              </div>  
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Número do CPF</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control col-sm-6" id="cpf" value="' . $incricao . '" name="cpf" readonly>
                </div>
              </div>  

              <div class="form-group">
                <label class="col-sm-2 control-label">Número da Matrícula</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control col-sm-6" id="matricula" value="' . $matricula . '" name="matricula" readonly>
                </div>
              </div>  

              

              <div class="form-group"' . $mostraentrega .'>
                <label class="col-sm-2 control-label">Retirado por (Nome/Doc)</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control col-sm-6" id="retirado" name="pessoaretira">
                </div>
              </div>  

            
              <!--<div class="form-group" style="padding-left:10px;">

                <label class="col-sm-2 control-label"><span style="color:#ff0000!important;">*</span>Documento ou Crachá </label>
                <div class="col-sm-10">
                <input type="file" name="foto-cesta" id="foto-cesta"                               
                  accept="image/*" 
                  capture="camera" required="required" />
                </div>   
              </div>-->
              <div class="form-group">
                <label class="col-sm-2 control-label">&nbsp;</label>
                <div class="col-sm-10">
                  <div class="alert ' . $css_votou . '" role="alert">' . $msg_voto . '</div>
                </div>
                <!--<label class="col-sm-2 control-label" ' . $mostrafoto . '></label>
                <div class="col-sm-10"  ' . $mostrafoto . '>
                  <div class="alert alert-secondary" role="alert" >Protocolo: <strong>' . $protocolo . '</strong> <br> ' . $comprovante . '</div>
                </div>-->
              </div>    
            
              '
      /*
             <div class="form-group" style="display:none;>
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">    
                  <div class="file-upload-wrapper">
                    <input type="file" class="form-control-file" id="foto_eleitor" data-max-size="2000" name="foto_eleitor" required>
                  </div>
                </div>
              </div>  
              <div class="form-group" '.$mostrafoto.'>
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">    
                  <div class="file-upload-wrapper">
                  <img src="'.$foto.'" alt="'.$nome_eleitor.'" style="max-width:200px; width:100%" />
                  </div>
                </div>
              </div>  
              -->
              */
      . '
              <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-2">
                    <!--<button type="submit" class="btn btn-primary">Nova consulta</button>-->
                    <a href="form_consulta" class="btn btn-primary">Nova consulta</a> 
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-success" id="confirmar-voto"' . $esconde_botao . ' >ENTREGAR CESTA</button>
                </div>
              </div>
            </form>
          </div>
        </section>
      </div><br>  
';
  }
}
