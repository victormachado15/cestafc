<?php
date_default_timezone_set('America/Sao_Paulo');
$dataLista = "";
$erro_msg = "";
$saida_count = 0;
$saida = "";
$err_saida ="";
$hoje = date('Ymd');
$agora = date('Ymd-His');
$dataHora = date('Y-m-d H:i:s');

//SRV.

######
######
######
    $servidor = "db";
    $usuario = "root";
    $senha = "cesta@2020";
    $dbname = "cesta_fundacao";
######
######
######
//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    $err_saida .= "sem conexão";
}
//echo "Conexão realizada com sucesso! <br/><br/>";
header('Content-Type: text/html; charset=utf-8');

$db_selected = mysqli_select_db($conn, $dbname);

mysqli_query($conn, "SET NAMES 'utf8'");//fazendo a conexao ser utf8

$sql_data = "SELECT data_lista FROM cestas_teste LIMIT 1";
$res_data = mysqli_query($conn, $sql_data) or die('Erro: ' . mysqli_error($conn));
if(mysqli_num_rows($res_data) ==1){
    $row_data = mysqli_fetch_array($res_data);
    $dataLista = "cestas_teste_".$row_data['data_lista'];
    
    //Verifica se já existe a tabela e renomeia com (-1) no final
    $sql_verifica_tab = "SHOW TABLES like '".$dataLista."'";
    $verifica_tab = mysqli_query($conn, $sql_verifica_tab);
    if(mysqli_num_rows($verifica_tab) == 1){
        $dataLista = $dataLista."-".$agora;
    }

    //Renomear tabela ativa para 
    $sql_rename = "RENAME TABLE `cestas_teste` TO `".$dataLista."`;";
    $rename= mysqli_query($conn, $sql_rename);
    if($rename !== FALSE){
    //  echo"Tabela copiada para ".$dataLista."<br>";
        //$new_table= mysqli_query($conn, "CREATE TABLE `tb_aux_aluguel` (`nome` varchar(150) NOT NULL,`cpf` varchar(11) NOT NULL,`data_lista` date ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
        $new_table= mysqli_query($conn, "CREATE TABLE `cestas_teste` (`id` int NOT NULL,`nome_servidor` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `cpf` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,`matricula` int NOT NULL,`registrado_por` int NOT NULL, `recebeu` int NOT NULL,
        `data_hora` timestamp NOT NULL, `foto` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,`protocolo` bigint NOT NULL,  `data_lista` date NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");

        if($new_table !== FALSE){

            $result=mysqli_query($conn, "ALTER TABLE `cestas_teste` ADD PRIMARY KEY (`id`);") or die("Alter Error: ".mysqli_error());
            $result=mysqli_query($conn, "ALTER TABLE `cestas_teste` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;") or die("Alter Error: ".mysqli_error());

            // echo "Tabela atualiada tb_aux_aluguel<br>";
            //VERIFICA SE O ARQUIVO FOI ENVIADO, LE O ARQUIVO E CADASTRA AS LINHAS NA TABELA.
            if(isset($_FILES['lista']) && $_FILES['lista']['size'] > 0){ 
                $filename=$_FILES["lista"]["tmp_name"];		
                $cadastrado = TRUE;
                $file = fopen($filename, "r");
                while (($getData = fgetcsv($file, 10000, ",")) !== FALSE){
        
                    //$sql = "INSERT into tb_aux_aluguel (nome,cpf) values ('".$getData[0]."','".$getData[1]."');";
               // $sql = "INSERT into tb_aux_aluguel (nome,cpf,data_lista) values ('".$getData[0]."','".$getData[1]."', '".$hoje."');";
               $sql = "INSERT into cestas_teste (nome_servidor,cpf,matricula,registrado_por,recebeu,data_hora,foto,protocolo,data_lista) values ('".$getData[0]."','".$getData[1]."','".$getData[2]."', '0','0','".$dataHora."','', 0,'".$hoje."');";
 
                    $result = mysqli_query($conn, $sql);
                    if(!isset($result)) {
                        $saida .="<script type=\"text/javascript\">
                                alert(\"Arquivo inválido ou com erro. Verifique os dados e formatação do arquivo.\");
                            // window.location = \"index.php\" </script>";		
                    }else{
                        $saida_count++;
                        $saida .= $getData[0].", ".$getData[1].", ".$getData[2]."<br>";
                       
                    }
                }   
                fclose($file);	   
            }	 
        }else{
            $err_saida .= '<div class="btn btn-success btn-lg btn-block"> Não foi possível CRIAR a tabela, verifique se já existe uma com o mesmo nome.</div>';
        }
    }else{
        $err_saida .= '<div class="btn btn-success btn-lg btn-block"> Não foi possível RENOMEAR a tabela, verifique se já existe uma com o mesmo nome.</div>';
    } 
}

?>

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
                <!-- Form Name -->
                <legend>
                     <strong> Enviar lista  </strong>
                </legend>
                <div class="form-group" style="margin-top: 40px; ">
                    <div class="col-md-2"></div>
                    <div class="col-md-6">
                        <p class="text-center"> 
                           
                        </p>
                        <P>
                            <?php
                            echo "<strong>Registros importados ". $saida_count."</strong><br><hr>";
                            echo $saida;
                            ?>
                        </p>
                    </div>
                    <div class="col-md-10">
                        <?php  echo $err_saida; ?> 
                    </div>
                </div>
            </div>
              
            <?php
              // get_all_records();
            ?>
        </div>
    </div>
</body>
</html>