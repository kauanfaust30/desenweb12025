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

$valorBusca = '';
if (!empty($_GET['busca'])) {
    $valorBusca = trim(filter_var($_GET['busca'], FILTER_SANITIZE_SPECIAL_CHARS));

    $sql = "SELECT pesnome, pessobrenome, pesemail, pescidade, pesestado 
            FROM TBPESSOA WHERE pesnome ILIKE $1";
    $result = pg_query_params($condb, $sql, array("%$valorBusca%"));
} else {
    $sql = "SELECT pesnome, pessobrenome, pesemail, pescidade, pesestado FROM TBPESSOA";
    $result = pg_query($condb, $sql);
}

$tabelaPessoas = "";
if ($result && pg_num_rows($result) > 0) {
    while ($row = pg_fetch_assoc($result)) {
        $tabelaPessoas .= "<tr>";
        $tabelaPessoas .= "<td>" . htmlspecialchars($row['pesnome']) . "</td>";
        $tabelaPessoas .= "<td>" . htmlspecialchars($row['pessobrenome']) . "</td>";
        $tabelaPessoas .= "<td>" . htmlspecialchars($row['pesemail']) . "</td>";
        $tabelaPessoas .= "<td>" . htmlspecialchars($row['pescidade']) . "</td>";
        $tabelaPessoas .= "<td>" . htmlspecialchars($row['pesestado']) . "</td>";
        $tabelaPessoas .= "</tr>";
    }
} else {
    $tabelaPessoas = "<tr><td colspan='5'>Nenhuma pessoa encontrada.</td></tr>";
}

pg_close($condb);
?>
