<?php
if (!isset($_SESSION)) 
	session_cache_expire(2);
	session_start();
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
    // Destrói a sessão por segurança e redireciona para login
    session_destroy();
    header("Location: login.php"); exit;
}
?>