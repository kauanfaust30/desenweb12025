<?php
session_start();
if (isset($_SESSION['admin_id'])) {
    header("Location: admin_dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Login Administrador</title>
<link rel="stylesheet" href="css/login.css">
</head>

<body>
<div class="login-container">
    <div class="login-card">
        <h2>Login Administrador</h2>

        <div class="input-group">
            <input type="text" id="usuario" placeholder="Digite seu usuário">
        </div>

        <div class="input-group">
            <input type="password" id="senha" placeholder="Digite sua senha">
        </div>

        <button id="btnLogin" class="btn-login">Entrar</button>

        <a href="../public/index.php" class="voltar">← Voltar</a>
    </div>
</div>

<script src="js/login.js"></script>
</body>
</html>
