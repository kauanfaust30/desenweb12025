<?php
$host = "localhost";
$port = "5432";
$dbname = "avaliacao_db";   // ajuste para o seu DB
$user = "postgres";
$password = "Kauan30112005@";

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    // Em ambiente de desenvolvimento: mostrar erro
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(["erro" => "Erro de conexão: " . $e->getMessage()]);
    exit;
}
?>
