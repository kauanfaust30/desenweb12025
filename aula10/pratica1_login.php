<?php
session_start();

if (isset($_SESSION['login'])) {
    $agora = date('d/m/Y H:i:s');
    $inicio = strtotime(str_replace('/', '-', $_SESSION['inicio']));
    $_SESSION['tempo'] = time() - $inicio;
    $_SESSION['ultima'] = $agora;

    echo "<h3>Dados da Sessão</h3>";
    echo "Login: " . $_SESSION['login'] . "<br>";
    echo "Senha: " . $_SESSION['senha'] . "<br>";
    echo "Início da sessão: " . $_SESSION['inicio'] . "<br>";
    echo "Última requisição: " . $_SESSION['ultima'] . "<br>";
    echo "Tempo de sessão: " . $_SESSION['tempo'] . " segundos<br><br>";

    echo "<h3>Dados via Cookie</h3>";
    if (!isset($_COOKIE['usuario']) || !isset($_COOKIE['inicio'])) {
        echo "<p style='color:red;'>⚠️ Os dados da sessão foram perdidos. Cookies expirados ou inexistentes.</p>";
    } else {
        echo "Usuário (cookie): " . $_COOKIE['usuario'] . "<br>";
        echo "Data/hora início (cookie): " . $_COOKIE['inicio'] . "<br>";
    }

    echo '<a href="login.php">Encerrar sessão</a>';
    session_destroy();
} else {
    echo "Nenhuma sessão ativa. Faça login novamente.<br>";
    echo '<a href="pratica1_index.php">Login</a>';
}
?>
