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
            Consultar Usuário
          </header>
          <div class="panel-body">
<?php

    // Tenta se conectar ao servidor MySQL
    $dbhandle = mysqli_connect('localhost', 'root', '') or trigger_error(mysqli_error($dbhandle));
    // Tenta se conectar a um banco de dados MySQL
    mysqli_select_db($dbhandle, 'consulta_voto') or trigger_error(mysqli_error($dbhandle));

    // Validação do usuário/senha digitados
    $sql = "SELECT * FROM `usuarios` ";
    $query = mysqli_query($dbhandle, $sql);
    if (mysqli_num_rows($query) < 1) {
        // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
       // echo "<script>alert('Login inválido'); </script>"; 
        header("Location: login.php");exit;
      } else {
       
        ?>
        <div id="resultado-excluir"></div>
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Nome</th>
            <th scope="col">Login</th>
            <th scope="col">E-mail</th>
            <th scope="col">Perfil</th>
            <th scope="col">Ativo</th>
            <th scope="col">Editar/Excluir</th>
            </tr>
        </thead>
        <tbody>
        <?php        
        while($resultado = mysqli_fetch_array($query)){
            $id = $resultado['id'];
            $nome = $resultado['nome'];
            $usuario = $resultado['usuario'];
            $email = $resultado['email'];
            $nivel = $resultado['nivel'];
            $ativo = $resultado['ativo'];
            if($nivel == 2){
                $nivel_nome = "Administrador";
            }else{ 
                $nivel_nome = "usuario";
            }
            if($ativo == 1){
                $ativo_nome = "Sim";
            }else{ 
                $ativo_nome = "Não";
            }
            echo '<tr>
                <th scope="row">'.$nome.'</th>
                <td>'.$usuario.'</td>
                <td>'.$email.'</td>
                <td>'.$nivel_nome.'</td>
                <td>'.$ativo_nome.'</td>
                <td> <a href="form-edita-usuario.php?id='.$id.'"><i class="fa fa-cog" aria-hidden="true"></i></a> / <a href="#" onclick="excluirUsuario('.$id.')"><i class="fa fa-trash-o" style="color:#FF4500;" aria-hidden="true"></i></a></td>
            </tr>';    
        }
        mysqli_close($dbhandle);

?>
        </tbody>
        </table>
        <hr>
        <a href="form-cadastra-usuario.php" class="btn btn-primary btn-lg" >Cadastrar Usuário</a>  
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
    function excluirUsuario(id) {
        
    }
    </script>
<?php
include('footer.php');
?>