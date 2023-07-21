<?php
include('inc/restrito.php');
include('inc/conexao.php');

if ((isset($_GET['pesquisa'])) && ($_GET['pesquisa'] != "")){

    // Tenta se conectar ao servidor MySQL
    //$dbhandle = mysqli_connect('db', 'votacao', 'voto2020') or trigger_error(mysqli_error($dbhandle));
    // Tenta se conectar a um banco de dados MySQL
    mysqli_select_db($dbhandle, 'consulta_voto') or trigger_error(mysqli_error($dbhandle));

    $pesquisa = mysqli_real_escape_string($dbhandle,$_GET['pesquisa']) ;
    // Validação do usuário/senha digitados
    $sql = "SELECT `nome_eleitor`, `cpf`, `zona`, `registrado_por`,`votou`, `data_hora`, `foto`, `protocolo` FROM `eleitor_votacao` WHERE  `nome_eleitor` LIKE '$pesquisa%'";
    $query = mysqli_query($dbhandle, $sql);
    if(mysqli_num_rows($query) < 1) {
        // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
       // echo "<script>alert('Login inválido'); </script>"; 
        //header("Location: login.php");exit;
        echo '<div class="alert alert-danger " role="alert">';
        echo "<h4>Eleitor não encontrado! <br> Verifique o nome digitado.<h4>" ;
        echo '<div>';
    } else {


       echo'<div class="col-lg-12">
        <section class="panel"  >
        <header class="panel-heading">
            Resultado da busca
        </header><div class="panel-body">';


        //echo'<div class="list-group">';
echo'<table class="table table-striped">
                <thead>
                  <tr>
                    <th><strong>NOME</strong></th>
                    <th><strong>DOCUMENTO</strong></th>
                    <th><strong>OPÇÃO</strong></th>
                  </tr>
                </thead>
                <tbody>';



        // Salva os dados encontrados na variável $resultado
        while($rows = mysqli_fetch_assoc($query)){

       // while($resultado = mysqli_fetch_assoc($query){
            $nome_eleitor   = $rows['nome_eleitor'];
            $incricao       = $rows['cpf'];
            $foto           = $rows['foto'];
            $votou          = $rows['votou'];
            $class_item = "";
            $esconde_botao = "";
            $style_item = "";            
            if ($foto != '') {
                $class_item = "list-group-item-success";
                $style_item = "style='color: #155724; background-color: #c3e6cb;'";
                
            }
            if ($votou != 0) {
                $class_item = "list-group-item-secondary";
                $esconde_botao = "style='display:none;'";
                 $style_item = "style='color: #383d41; background-color: #d6d8db;'";
                 

            }
            
          //  echo'<li class="list-group-item '.$class_item.'" '.$style_item.'> NOME: <strong>'.$nome_eleitor.'</strong> | DOCUMENTO: <strong>'.$incricao.'</strong>  <button type="submit" class="btn btn-sm btn-success" id="confirmar-voto"'.$esconde_botao.' > <strong>Cadastrar foto<strong> </button> </li>';
 


 echo'<tr '.$style_item.' id="'.$incricao.'""> <td>'.$nome_eleitor.'</td> <td>'.$incricao.'</td>
 <td>&nbsp;<a href="form-atualiza-nome.php?titulo='.$incricao.'" '.$esconde_botao.' class="btn btn-sm btn-primary" > REGISTRAR </a>        
<!--  <td>&nbsp;<a href="form-atualiza-nome.php?titulo='.$incricao.'" '.$esconde_botao.' class="btn btn-sm btn-primary" onClick="return confirm(\'Atualizar dados de: '.$nome_eleitor.'. \nPortador do titulo: '.$incricao.'?\');"> REGISTRAR </a> -->
        <!-- <button type="submit" class="btn btn-sm btn-success" id="confirmar-voto"'.$esconde_botao.' > <strong>Cadastrar foto<strong> </button> --> </td>
    </tr>';
/*
           echo '
            <div class="panel-body">
            <form class="form-validate form-horizontal" id="atualiza_voto" method="post" action="atualiza-eleitor.php" enctype="multipart/form-data" onSubmit="return confirm(\'Confirmar voto de: '.$nome_eleitor.'. \nPortador do titulo: '.$incricao.'\');"> 
                <div class="form-group"> 
                    <label class="col-sm-2 control-label">Nome Completo</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control col-sm-6" id="nome_eleitor" value="'.$nome_eleitor.'" name="nome_eleitor" readonly>
                    </div>
                </div>  
                <div class="form-group">
                <label class="col-sm-2 control-label">Número do título</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control col-sm-6" id="cpf" value="'.$incricao.'" name="cpf" readonly>
                    </div>
                    <div class="col-sm-5">
                        <button type="submit" class="btn btn-success" id="confirmar-voto"'.$esconde_botao.' >Confirmar voto</button>
                    </div>
                </div>
                </form>
            </div>';

*/


      }//end while


//echo'</div></ul>';

                echo'</tbody>
              </table>';

      echo '</section>
      </div><br>';
       
    }//end if
}//end if isset

?>





                  
                  








