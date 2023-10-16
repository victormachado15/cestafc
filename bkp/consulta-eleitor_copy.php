<?php
include('inc/restrito.php');
include('inc/conexao.php');

if ((isset($_GET['ok'])) && ($_GET['ok'] == 1)) {
  echo "<script>alert('Cadastro atualizado com sucesso!'); </script>";
}

if ((isset($_GET['titulo'])) && ($_GET['titulo'] != "")) {
  // if ((isset($_GET['titulo'])) && ($_GET['titulo'] != "") && (isset($_GET['data'])) && ($_GET['data'] != "")) {
  
  // Tenta se conectar ao servidor MySQL
  //$dbhandle = mysqli_connect('db', 'root', 'cesta@2020') or trigger_error(mysqli_error($dbhandle));
  // Tenta se conectar a um banco de dados MySQL
  mysqli_select_db($dbhandle, 'cesta_fundacao') or trigger_error(mysqli_error($dbhandle));
  
  //titulo é cpf
  echo "<script>alert('obtendo o titulo'); </script>";
  $titulo = mysqli_real_escape_string($dbhandle, $_GET['titulo']);
  //$mes_cesta = $_GET['mes'];
  echo "<script>alert('obtendo o titulo: $titulo'); </script>";

  // Validação do usuário/senha digitados
  //$sql = "SELECT `nome_eleitor`, `cpf`, `zona`, `registrado_por`,`votou`, `data_hora`, `foto`, `protocolo` FROM `eleitor_votacao` WHERE `cpf` = ".$titulo ." LIMIT 1";
  // $sql = "SELECT `id`, `nome_servidor`, `cpf`, `matricula`, `registrado_por`,`recebeu`, `data_hora`, `protocolo`, `ultima_recebida` FROM `cestas_entrega` WHERE `cpf` = " . $titulo . " LIMIT 1";
  // Selecionando último registro de cesta entregue filtrando pelo CPF
  $sql = "SELECT * FROM cestas_entrega2023 as ent JOIN servidores as serv ON ent.id_servidor = serv.id WHERE serv.cpf = $titulo ORDER BY ent.id DESC LIMIT 1";
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
    $id_servidor    = $resultado['id_servidor'];
    // $incricao       = $resultado['cpf'];
    $registrado_por = $resultado['registrado_por'];
    $data_hora      = $resultado['data_hora'];
    //   $foto           = $resultado['foto'];
    // $ultima         = $resultado['ultima_recebida'];
    $protocolo      = $resultado['protocolo'];
    $retirado_por   = $resultado['retirado_por'];
    $mes_cesta      = $resultado['mes_cesta'];
   

    $data_entrega = date('d/m/Y H:i', strtotime($data_hora));
    $mes_atual  = $_GET['mes'];


    echo $mes_atual;

    if ($mes_cesta == $mes_atual) {
      $msg_retirada = "O funcionário consultado <strong style='color:#333'>Já Retirou a Cesta!</strong>";
      $css_votou = "alert-dark";
      $esconde_botao = 'style="display:none;"';
      $mostrafoto = '';
      $mostraentrega = 'style="display:none; "';
      //Remover LIMIT 1! é um remendo p/ funcionar devido a duplicidade ma tabela usuarios
      $sql_usuario = "SELECT nome, `local` FROM usuarios WHERE id = " . $registrado_por . " LIMIT 1";
      $query_usuario = mysqli_query($dbhandle, $sql_usuario);
      $num = mysqli_num_rows($query_usuario);
      if ($num != 1) {
        //mensagem usuario nao encontrado. break;
      } else {
        $dados_usuario = mysqli_fetch_assoc($query_usuario);
        $nome_usuario = $dados_usuario['nome'];
        $escola_usuario = $dados_usuario['local'];
        $msg_retirada .= "<br> Atualizado por: <strong style='color:#333'>" . $nome_usuario . "</strong> <br><!-- No local: <strong style='color:#333'>" . $escola_usuario . "</strong> <br>--> Em: <strong style='color:#333'>" . $data_entrega . "</strong>";
        $comprovante = '<a href="comprovante.php?cpf=' . $titulo . '" target="_blank" class="btn btn-primary">Comprovante de entrega</a>';
      }
    } else {
      $msg_retirada = "O funcionário ainda não retirou a cesta! Ultima retirada no mês: " . $mes_cesta;
      $css_votou = "alert-danger";
      $esconde_botao = '';
      $mostrafoto = 'style="display:none; "';
      $mostraentrega = '';
      $comprovante = '';
    }

    //consulta nome do servidor para exibir na tela
    $sqlNome = "SELECT nome_servidor FROM servidores WHERE cpf = " . $titulo . " LIMIT 1";
    $queryNome = mysqli_query($dbhandle, $sqlNome);
    if (mysqli_num_rows($queryNome) != 1) {
      echo print_r($queryNome);
    } else {
      $dados = mysqli_fetch_assoc($queryNome);
      $nome_eleitor = $dados["nome_servidor"];
    }

    echo '
        <div class="col-lg-12">
        <section class="panel"  >
         <header class="panel-heading">
            Resultado da busca
          </header>
          <div class="panel-body">
          <form class="form-validate form-horizontal" id="atualiza_voto" method="post" action="atualiza-eleitor_copy.php" enctype="multipart/form-data" onSubmit="return confirm(\'Confirmar entrega de cesta de: ' . $nome_eleitor . '. \nPortador do CPF/Documento: ' . $titulo . '\');"> 
              <div class="form-group">
                <label class="col-sm-2 control-label">Nome Completo</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control col-sm-6" id="nome_eleitor" value="' . $nome_eleitor . '" name="nome_eleitor" readonly>
                </div>
              </div>

              <!--div com inputs para inserção no BD --> 
              <div class="">
                <input type="hidden" class="" id="id_servidor" value="' . $id_servidor . '" name="id_servidor" readonly>
                <input type="hidden" class="" id="mes_cesta" value="' . $mes_cesta . '" name="mes_cesta" readonly>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Número do CPF</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control col-sm-6" id="cpf" value="' . $titulo . '" name="cpf" readonly>
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
                  <div class="alert ' . $css_votou . '" role="alert">' . $msg_retirada . '</div>
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
