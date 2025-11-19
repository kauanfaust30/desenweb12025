<?php include 'listarPessoas1.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Pessoas</title>
    <link rel="stylesheet" type="text/css" href="exer01.css">
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

    <?= $tabelaPessoas ?>
    </table>

    <br>
    <input type="button" value="Voltar" onclick="location.href='cadpessoa.html'">
</body>
</html>