<?php
//$dbhandle = mysqli_connect('https://192.168.255.83:8086', 'root', 'cesta@2020') or trigger_error(mysqli_error($dbhandle));
//$dbhandle = mysqli_connect('db', 'root', 'cesta@2020') or trigger_error(mysqli_error($dbhandle));


$dbhandle = mysqli_connect('localhost', 'root', '') or trigger_error(mysqli_error($dbhandle));

/* $servername = "localhost";
$username = "root";
$password = ""; // Insira a senha aqui se tiver uma senha definida

// Criar conexão
$conn = new mysqli($servername, $username, $password); */

// Verificar conexão
if ($dbhandle->connect_error) {
    die("Falha na conexão: " . $dbhandle->connect_error);
}

echo "Conexão bem-sucedida ao banco de dados!";