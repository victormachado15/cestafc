<?php
include('header.php');
include('sidebar.php');
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
                <form class="form-horizontal" method="post" action="cadastra-usuario.php">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nome Completo<span class="mandatory">*</span></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control col-sm-6" name="nome_usuario" maxlength="50" title="Caso necessário, abrevie o nome. Máximo de 50 caracteres" required >
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Login<span class="mandatory">*</span></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control col-sm-6" name="login_usuario" pattern="[a-zà-úA-ZÀ-Ú0-9]{3,15}" title="Nome curto que será usado para acessar o sistema." required>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Senha<span class="mandatory">*</span></label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control col-sm-6" id="senha" name="senha_usuario" pattern="[a-zA-Z0-9]{4,15}" title="A senha deve ter letras e números. Com no mínimo 6 e no máximo 15 caracteres" placeholder="Somente letras e números. Com no mínimo 6 e no máximo 15 caracteres" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Repetir Senha<span class="mandatory">*</span></label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control col-sm-6" id ="repetirsenha" name="repetirsenha_usuario" pattern="[a-zA-Z0-9]{4,15}" title="A senha deve ter letras e números. Com no mínimo 6 e no máximo 15 caracteres" placeholder="Somente letras e números. Com no mínimo 6 e no máximo 15 caracteres" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">e-mail<span class="mandatory">*</span></label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control col-sm-6" name="email_usuario" required title="Digite um e-mail válido" value="email@email.com" >
                    </div>
                  </div>      
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Escola<span class="mandatory">*</span></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control col-sm-6" placeholder="EMEF..." name="escola_usuario" required>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                  </div>
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

