<?php
include 'db_config.php';

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND senha='$senha'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: sucesso.php");
} else {
    echo "Usuário ou senha inválidos.";
}

$conn->close();
?>