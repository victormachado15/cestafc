
<?php
// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
  header("Location: index.php"); exit;
}
// Tenta se conectar ao servidor MySQL
$dbhandle = mysqli_connect('db', 'votavacao', 'voto2020') or trigger_error(mysqli_error($dbhandle));
// Tenta se conectar a um banco de dados MySQL
mysqli_select_db($dbhandle, 'consulta_voto') or trigger_error(mysqli_error($dbhandle));
$usuario = mysqli_real_escape_string($dbhandle, $_POST['usuario']);
$senha = mysqli_real_escape_string($dbhandle, $_POST['senha']);
// Validação do usuário/senha digitados
$sql = "SELECT `id`, `nome`, `nivel` FROM `usuarios` WHERE (`usuario` = '".$usuario ."') AND (`senha` = '". sha1($senha) ."') AND (`ativo` = 1) LIMIT 1";
$query = mysqli_query($dbhandle, $sql);

if (mysqli_num_rows($query) != 1) {
  // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
  header("Location: login.php?err=1");exit;
} else {
  // Salva os dados encontrados na variável $resultado
  $resultado = mysqli_fetch_assoc($query);
  if($resultado['nivel'] < 2){
    //echo "<script> alert('O Usuário não tem permissão para login, verifique o endereço URL.');</script>";
    header("Location: login.php?err=2");exit;
  }
  mysqli_close($dbhandle);
  // Se a sessão não existir, inicia uma
  if ((!isset($_SESSION))OR (session_status() !== PHP_SESSION_ACTIVE)) {
    session_cache_expire(2);
    session_start();
  }
  // Salva os dados encontrados na sessão
  $_SESSION['UsuarioID'] = $resultado['id'];
  $_SESSION['UsuarioNome'] = $resultado['nome'];
  $_SESSION['UsuarioNivel'] = $resultado['nivel'];

  // Redireciona o visitante
  header("Location: index.php"); exit;
}