<?php
define("DB_HOST", "localhost");
define("DB_PORT", "5432");
define("DB_NAME", "local"); 
define("DB_USER", "postgres");
define("DB_PASS", "Kauan30112005@");

$connectionString = "host=".DB_HOST." port=".DB_PORT." dbname=".DB_NAME." user=".DB_USER." password=".DB_PASS;
$condb = pg_connect($connectionString);

if(!$condb){
    die("Erro: Não foi possível conectar ao banco de dados.");
}

$query = "SELECT pesnome, pessobrenome, pesemail, pescidade, pesestado FROM TBPESSOA";
$result = pg_query($condb, $query);

if(!$result){
    die("Erro ao executar consulta: " . pg_last_error($condb));
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Pessoas</title>
    <style>
        table {
            width: 60%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h1>Lista de Pessoas Cadastradas</h1>

    <table>
        <tr>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Email</th>
            <th>Cidade</th>
            <th>Estado</th>
        </tr>

        <?php
        while ($row = pg_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['pesnome']) . "</td>";
            echo "<td>" . htmlspecialchars($row['pessobrenome']) . "</td>";
            echo "<td>" . htmlspecialchars($row['pesemail']) . "</td>";
            echo "<td>" . htmlspecialchars($row['pescidade']) . "</td>";
            echo "<td>" . htmlspecialchars($row['pesestado']) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <br>
    <input type="button" value="Voltar" onclick="location.href='cadpessoa.html'">
</body>
</html>