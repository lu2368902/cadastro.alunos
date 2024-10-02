
<?php
$servername = "localhost";
$username = "lucia";  // Substitua pelo seu usuário do MySQL
$password = "123456"; // Substitua pela sua senha do MySQL
$dbname = "colegio";
$port = 3307;

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
} 
?>
