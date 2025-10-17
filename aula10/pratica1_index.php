<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <h3>Login</h3>
        <label>Usuário:</label>
        <input type="text" name="login" required><br><br>

        <label>Senha:</label>
        <input type="password" name="senha" required><br><br>

        <input type="submit" value="Entrar">
    </form>
</body>
</html>

  <?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['senha'] = $_POST['senha'];
    $_SESSION['inicio'] = date('d/m/Y H:i:s');
    $_SESSION['ultima'] = $_SESSION['inicio'];
    $_SESSION['tempo'] = 0;

    setcookie('usuario', $_SESSION['login'], time() + (60 * 5), '/');
    setcookie('inicio', $_SESSION['inicio'], time() + (60 * 5), '/');

    header('Location: pratica1_login.php');
    exit;
}
?>
