<?php
define("DB_HOST", "localhost");
define("DB_PORT", "5432");
define("DB_NAME", "local"); 
define("DB_USER", "postgres");
define("DB_PASS", "Kauan30112005@");

$connectionString = "host=".DB_HOST." port=".DB_PORT." dbname=".DB_NAME." user=".DB_USER." password=".DB_PASS;
$condb = pg_connect($connectionString);

if (!$condb) {
    die("Erro: Não foi possível conectar ao banco de dados.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim(filter_var($_POST['nome'], FILTER_SANITIZE_SPECIAL_CHARS));
    $sobrenome = trim(filter_var($_POST['sobrenome'], FILTER_SANITIZE_SPECIAL_CHARS));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $senha = $_POST['senha'];
    $cidade = trim(filter_var($_POST['cidade'], FILTER_SANITIZE_SPECIAL_CHARS));
    $estado = strtoupper(trim(filter_var($_POST['estado'], FILTER_SANITIZE_SPECIAL_CHARS)));

    if (empty($nome) || empty($sobrenome) || !$email || empty($senha) || empty($cidade) || empty($estado)) {
        die("Erro: Preencha todos os campos corretamente. <br><a href='cadpessoa.html'>Voltar</a>");
    }

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $aDados = array($nome, $sobrenome, $email, $senhaHash, $cidade, $estado);

    $sql = "INSERT INTO TBPESSOA (PESNOME, PESSOBRENOME, PESEMAIL, PESPASSWORD, PESCIDADE, PESESTADO) 
            VALUES ($1, $2, $3, $4, $5, $6)";
    $result = pg_query_params($condb, $sql, $aDados);

    if ($result) {
        echo "<h3>Cadastro realizado com sucesso!</h3>";
    } else {
        echo "<h3>Erro ao cadastrar pessoa.</h3>";
    }

    echo "<br><input type='button' value='Voltar' onclick=\"location.href='cadpessoa.html'\">";

}
?>
