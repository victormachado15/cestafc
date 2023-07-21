<?php
//include('inc/header.php');
//include('inc/sidebar.php');
date_default_timezone_set('America/Sao_Paulo');
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
		<title>Cesta Básica</title>
	<head>
	<body style="padding: 20px;">
		<?php
            $data_atual = date("jMy-h:i:s");
            $arquivo = 'EntregaCesta'.$data_atual.'.xls';

            // Criamos uma tabela HTML com o formato da planilha para excel;
            $tabela = '<div style="padding: 20px;">';
            $tabela .= '<table>';
            $tabela .= '<tr>';
            $tabela .= '<td colspan="5">Tabela de Cestas entregues '.$data_atual.' </tr>';
            $tabela .= '</tr>';
            $tabela .= '<tr>';
            $tabela .= '<td><b>Nome</b></td>';
            //$tabela .= '<td><b>CPF</b></td>';
            $tabela .= '<td><b>Matrícula</b></td>';
            $tabela .= '<td><b>Data de entrega</b></td>';
            $tabela .= '<td><b>Protocolo</b></td>';
            $tabela .= '</tr>';
            $tabela .= '</div>';

            // Puxando dados do Banco de dados
            mysqli_select_db($dbhandle, 'cesta_fundacao') or trigger_error(mysqli_error($dbhandle));
            $sql = "SELECT `nome_servidor`, `cpf`, `matricula`, `registrado_por`,`recebeu`, `data_hora`, `protocolo` FROM `cestas_entrega` WHERE `recebeu` = 1";
            $resultado = mysqli_query($dbhandle, $sql);

            while($dados = mysqli_fetch_array($resultado))
            {
                $dt_entrega = strtotime($dados["data_hora"]); 
			    $data_entrega = date("d/m/y H:i:s", $dt_entrega);
                $tabela .= '<tr>';
                $tabela .= '<td>'.$dados['nome_servidor'].'</td>';
                //$tabela .= '<td>'.$dados['cpf'].'</td>';
                $tabela .= '<td>'.$dados['matricula'].'</td>';
                $tabela .= '<td>'.$data_entrega.'</td>';
                $tabela .= '<td>'.$dados['protocolo'].'</td>';
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