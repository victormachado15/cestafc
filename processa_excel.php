<?php
session_start();
include('inc/conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] == UPLOAD_ERR_OK) {
        $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
        $dados = array_map('str_getcsv', file($arquivo_tmp));

        // Inicialize contadores
        $ativos = 0;
        $inativados = 0;
        $adicionados = 0;

        // Inserir pessoas que estão na planilha, mas não no banco de dados
        for ($i = 2; $i < count($dados); $i++) {
            $linha = $dados[$i];
            if (isset($linha[3]) && isset($linha[2]) && !empty($linha[3])) { // Verifica se o CPF não está vazio
                $cpf = $linha[3];

                $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

                // Verifica se o CPF não existe no banco de dados
                $query = "SELECT cpf FROM servidores WHERE cpf = '$cpf'";
                $resultado = mysqli_query($dbhandle, $query);

                if (mysqli_num_rows($resultado) == 0) {
                    $matricula = $linha[0];
                    $nome = $linha[1];
                    $cargo = $linha[4];
                    $local_trabalho = $linha[5];

                    $query = "INSERT INTO servidores (nome_servidor, cpf, matricula, cargo, local_trabalho) VALUES ('$nome', '$cpf', '$matricula', '$cargo', '$local_trabalho')";
                    $resultado = mysqli_query($dbhandle, $query);

                    if ($resultado) {
                        $adicionados++;
                    } else {
                        echo "Erro ao inserir pessoa com CPF: $cpf";
                    }
                }
            }
        }
        
        foreach ($dados as $linha) {
            if (isset($linha[3]) && isset($linha[2])) {
                $cpf = $linha[3];

                $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

                $query = "UPDATE servidores SET ativo = 1 WHERE cpf = '$cpf'";
                $resultado = mysqli_query($dbhandle, $query);

                if ($resultado) {
                    $ativos++;
                } else {
                    echo "Erro ao atualizar CPF: $cpf";
                }
            }
        }

        // Atualizar todos os CPFs que não estiverem na planilha para ativo = 0
        $query = "UPDATE servidores SET ativo = 0 WHERE cpf NOT IN (";
        $cpf_list = array_map(function ($linha) {
            if (isset($linha[3])) {
                $cpf = $linha[3];
                $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
                return "'" . $cpf . "'";
            } else {
                return null;
            }
        }, $dados);

        $query .= implode(",", array_filter($cpf_list, 'strlen')) . ")";
        $resultado = mysqli_query($dbhandle, $query);

        if ($resultado) {
            $inativados = mysqli_affected_rows($dbhandle);
            $message = "Registros atualizados com sucesso! Ativos: $ativos, Inativados: $inativados, Adicionados: $adicionados";
            $_SESSION['redirect_message'] = $message;
        } else {
            echo "Erro ao atualizar registros.";
        }

        header('Location: form_importar.php');
        exit;

    }
}
?>