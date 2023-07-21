<?php
include('header.php');
include('sidebar.php');
?>
   <!--main content start-->
   <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">

        <section class="panel">
          <header class="panel-heading">
            Consultar Candidato
          </header>
          <div class="panel-body">
<?php


$dbhandle = mysqli_connect('localhost', 'id13390035_votacao2020', '$enh@_DTI2020') or trigger_error(mysqli_error($dbhandle));
mysqli_select_db($dbhandle, 'id13390035_consulta_voto') or trigger_error(mysqli_error($dbhandle));
//$dbhandle = mysqli_connect('localhost', 'root', 'root') or trigger_error(mysqli_error($dbhandle));
//mysqli_select_db($dbhandle, 'votacao') or trigger_error(mysqli_error($dbhandle));


// Tenta se conectar ao servidor MySQL
//    $dbhandle = mysqli_connect('db', 'votacao', 'voto2020') or trigger_error(mysqli_error($dbhandle));
// Tenta se conectar a um banco de dados MySQL
//    mysqli_select_db($dbhandle, 'consulta_voto') or trigger_error(mysqli_error($dbhandle));


    // Consulta candidatos
    $sql = "SELECT * FROM `candidatos` ";
    $query = mysqli_query($dbhandle, $sql);
    if (mysqli_num_rows($query) < 1) {
        echo '<div class="alert alert-warning" role="alert"> Nenhum candidato cadastrado! </div>'; 
      } else {


        ?>
        <div>*Candidato <span style="color:#003300"> ativo </span>, <span style="color:#b30000"> bloqueado </span></div>
        <div id="resultado-excluir"></div>
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Nome</th>
            <th scope="col">Partido</th>
            <th scope="col">Número</th>
            <th scope="col">sigla</th>

            <th scope="col">Foto</th>
            <th scope="col"><i class="fa fa-wrench" aria-hidden="true"></i></th>
            </tr>
        </thead>
        <tbody>
        <?php        
        while($resultado = mysqli_fetch_array($query)){
            $id = $resultado['id'];
            $nome = $resultado['nome'];
            $partido = $resultado['partido'];
            $numero = $resultado['numero'];
            $sigla = $resultado['sigla'];
            $foto = $resultado['foto'];
            $ativo = $resultado['ativo'];

            if($ativo == 1){
                $ativo_nome = 'style="color:#003300"'; //color="#003300" Sim
            }else{ 
                $ativo_nome = 'style="color:#b30000"'; //color="#b30000" Não
            }
            echo '<tr>
                <th scope="row" '.$ativo_nome.' >'.$nome.'</th>
                <td>'.$partido.'</td>
                <td>'.$numero.'</td>
                <td>'.$sigla.'</td>
                <td><img src="'.$foto.'" width="80px" /> </td>

                <td> <!-- <a href="form-edita-candidato.php?id='.$id.'"><i class="fa fa-cog" aria-hidden="true"></i></a> / -->
                <a href="#" onclick="excluirCandidato('.$id.')"><i class="fa fa-trash-o" style="color:#FF4500;" aria-hidden="true"></i></a>
                </td>
            </tr>';    
        }
        mysqli_close($dbhandle);

?>
        </tbody>
        </table>
        <hr>
        <a href="form-cadastra-candidato.php" class="btn btn-primary btn-lg" >Cadastrar Candidato</a>  
    <?php
    }
?>
          </div>
        </section>
          </div>
        </div>
        <!-- page start-->
        <!--Page content goes here-->
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
    <script  type='text/javascript'>
    function excluirCandidato(id) {
        
    }
    </script>
<?php
include('footer.php');
?>