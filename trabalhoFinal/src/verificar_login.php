<?php
session_start();
require_once __DIR__ . "/conexao.php";

header("Content-Type: application/json; charset=utf-8");

$data = json_decode(file_get_contents("php://input"), true);

if (!$data || empty($data['usuario']) || empty($data['senha'])) {
    echo json_encode(["success" => false, "message" => "Dados incompletos"]);
    exit;
}

$usuario = $data['usuario'];
$senha = $data['senha'];

$stmt = $pdo->prepare("SELECT * FROM admin WHERE usuario = :u LIMIT 1");
$stmt->execute([':u' => $usuario]);
$admin = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$admin) {
    echo json_encode(["success" => false, "message" => "Usuário não encontrado"]);
    exit;
}

if ($senha !== $admin['senha_hash']) {
    echo json_encode(["success" => false, "message" => "Senha incorreta"]);
    exit;
}

$_SESSION['admin_id'] = $admin['admin_id'];

echo json_encode(["success" => true]);
