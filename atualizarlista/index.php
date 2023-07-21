<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>

</head>

<body>
    <div id="wrap">
        <div class="container">
            <div class="row">

                <form class="form-horizontal" action="atualizar-lista-prod.php" method="post" name="upload_excel" enctype="multipart/form-data">
                    <fieldset>

                        <!-- Form Name -->
                        <strong> Enviar lista de contemplados </strong>
                        <div class="form-group" style="margin-top: 40px; ">
                        <div class="col-md-2"></div>
                        <div class="col-md-6">
                            <P><b>Para gerar um arquivo CSV válido no excell,</b> <br> exclua os cabeçalhos das colunas e deixe os campos nessa ordem (Nome | CPF | Matrícula).<br><br>
                            </P>
                            <P>Vá para Arquivo > Salvar como. Clique em Procurar. Na caixa de diálogo Salvar como, em Salvar como tipo, 
                            escolha o formato de arquivo de texto da planilha; por exemplo, clique em Texto (Delimitado por tabulação) ou CSV (Delimitado por vírgula)
                            </p>
                            <p class="text-center">  <br>  <strong> Envie o arquivo no formulário abaixo</strong></p>
                        </div>
                        </div>

                        <!-- File Button -->
                        <div class="form-group" style="margin-top: 20px; border-top: 1px dotted #e5e5e5;">
                            <br><label class="col-md-2 control-label" for="filebutton">&nbsp;</label>
                            <div class="col-md-4">
                                <input type="file" name="lista" id="file" accept=".csv"  class="input-large" required>
                            </div>
                            <div class="col-md-4 text-center">
                                <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Enviar</button>
                            </div>
                        </div>

                     



                    </fieldset>
                </form>

            </div>
            <?php
              // get_all_records();
            ?>
        </div>
    </div>
</body>

</html>