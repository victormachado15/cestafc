<?php
//include('inc/header.php');
//include('inc/sidebar.php');
include('restrito.php');
include_once('inc/conexao.php');
if ((isset($_GET['data_inicio'])) && ($_GET['data_inicio'] != "")){
	$data_inicio = mysqli_real_escape_string($dbhandle,$_GET['data_inicio']);
	$sem_filtro = FALSE;
}else{
	$sem_filtro = TRUE;
}
if ((isset($_GET['data_final'])) && ($_GET['data_final'] != "")){
    $data_fim = mysqli_real_escape_string($dbhandle,$_GET['data_final']);
 }else {
	$data_fim = "";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cesta de Natal</title>
	<head>
	<body style="padding: 20px;">
		<?php

            $arquivo = 'dados_entrega.xls';

            // Criamos uma tabela HTML com o formato da planilha para excel;
            $tabela = '<div style="padding: 20px;">';
            $tabela .= '<table border="1">';
            $tabela .= '<tr>';
            $tabela .= '<td colspan="2">Tabela de Cestas entregues</tr>';
            $tabela .= '</tr>';
            $tabela .= '<tr>';
            $tabela .= '<td><b>Nome</b></td>';
            $tabela .= '<td><b>CPF</b></td>';
            $tabela .= '<td><b>Matrícula</b></td>';
            $tabela .= '</tr>';
            $tabela .= '</div>';

            // Puxando dados do Banco de dados
            mysqli_select_db($dbhandle, 'consulta_voto') or trigger_error(mysqli_error($dbhandle));
            $sql = "SELECT `nome_eleitor`, `cpf`, `matricula`, `registrado_por`,`votou`, `data_hora`, `protocolo` FROM `eleitor_votacao` WHERE `votou` = 1 LIMIT 1";
            $resultado = mysqli_query($dbhandle, $sql);

            while($dados = mysqli_fetch_array($resultado))
            {
                $tabela .= '<tr>';
                $tabela .= '<td>'.$dados['nome_eleitor'].'</td>';
                $tabela .= '<td>'.$dados['cpf'].'</td>';
                $tabela .= '<td>'.$dados['matricula'].'</td>';
                $tabela .= '</tr>';
            }

            $tabela .= '</table>';

            // Força o Download do Arquivo Gerado
            	// Configurações header para forçar o download
            header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
            header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
            header ("Cache-Control: no-cache, must-revalidate");
            header ("Pragma: no-cache");
            header ("Content-type: application/x-msexcel");
            header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
            header ("Content-Description: PHP Generated Data" );
     
            echo $tabela;
    
        ?>
	</body>
</html>