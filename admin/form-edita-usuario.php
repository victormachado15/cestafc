<?php
include('header.php');
include('sidebar.php');
//include('inc/conexao.php');
if ((isset($_GET['ok'])) && ($_GET['ok'] == 1)){
    echo "<script>alert('Cadastro atualizado com sucesso!'); </script>"; 
}
if ((isset($_GET['id'])) && ($_GET['id'] != "")){
    // Tenta se conectar ao servidor MySQL
    $dbhandle = mysqli_connect('db', 'votacao', 'voto2020') or trigger_error(mysqli_error($dbhandle));
    // $dbhandle = mysqli_connect('localhost', 'root', '') or trigger_error(mysqli_error($dbhandle));
    // Tenta se conectar a um banco de dados MySQL
    mysqli_select_db($dbhandle, 'consulta_voto') or trigger_error(mysqli_error($dbhandle));
    $ativo = ""; 
    $inativo = "";
    $nome_usuario = "";
    $login_usuario = "";
    $email_usuario = "";
    $ativo_usuario = "";
    
    $id = mysqli_real_escape_string($dbhandle,$_GET['id']) ;
    // Validação do usuário/senha digitados
    $sql = "SELECT * FROM `usuarios` WHERE `id` = ".$id." LIMIT 1";
    $query = mysqli_query($dbhandle, $sql);
    if (mysqli_num_rows($query) != 1) {
        echo "<h4>Eleitor não encontrado! <br> Verifique o número digitado.<h4>" ;
        echo '<div>';
    } else {
        // Salva os dados encontrados na variável $resultado
        $resultado = mysqli_fetch_assoc($query);
        $nome_usuario = $resultado['nome'];
        $login_usuario = $resultado['usuario'];
        $email_usuario = $resultado['email'];
        $escola_usuario = $resultado['escola'];
        $ativo_usuario = $resultado['ativo'];
        if($ativo_usuario == 1){ 
            $ativo = "selected"; 
        }else{
            $inativo ="selected";
        }
    }
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
               Cadastro de Usuário
              </header>
              <div class="panel-body">
                <form class="form-horizontal" method="post" action="atualiza-usuario.php">
                  <div class="form-group">
                    
                    <div class="col-sm-12">
                     <ul>
                         <li><strong>Para manter a senha atual, deixe o campo senha em branco.</strong></li>
                         <li>Os campos Login e e-mail não podem ser alterados por segurança.</li>
                     </ul> 
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nome Completo*: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control col-sm-6" name="nome_usuario" value="<?php echo $nome_usuario ?>" maxlength="50" title="Caso necessário, abrevie o nome. Máximo de 50 caracteres" required >
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Login: </label>
                    <div class="col-sm-10">
                <input type="text" class="form-control col-sm-6" name="login_usuario" value="<?php echo $login_usuario ?>" pattern="[a-zà-úA-ZÀ-Ú0-9]{3,15}" title="Nome curto que será usado para acessar o sistema." required readonly>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Senha*</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control col-sm-6" id="senha" name="senha_usuario" pattern="[a-zA-Z0-9]{6,15}" title="A senha deve ter letras e números. Com no mínimo 6 e no máximo 15 caracteres" placeholder="Somente letras e números. Com no mínimo 6 e no máximo 15 caracteres" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Repetir Senha*</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control col-sm-6" id ="repetirsenha" name="repetirsenha_usuario" pattern="[a-zA-Z0-9]{6,15}" title="A senha deve ter letras e números. Com no mínimo 6 e no máximo 15 caracteres" placeholder="Somente letras e números. Com no mínimo 6 e no máximo 15 caracteres" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">e-mail: </label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control col-sm-6" name="email_usuario" value="<?php echo $email_usuario ?>" required title="Digite um e-mail válido" readonly>
                    </div>
                  </div>   
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Escola: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control col-sm-6" name="escola_usuario" placeholder="EMEF..." pattern="[a-zà-úA-ZÀ-Ú0-9]{3,180}" value="<?php echo $escola_usuario ?>" readonly>
                    </div>
                  </div>    
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Ativo: </label>
                    <div class="col-sm-10">
                    <select class="form-control" id="usuario_ativo" name="usuario_ativo">
                        <option value="1" <?php echo $ativo; ?>>Sim</option>
                        <option value="0" <?php echo $inativo; ?>>Não</option>
                    </select>
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
}
include('footer.php');
?>

