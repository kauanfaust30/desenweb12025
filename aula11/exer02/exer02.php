<?php
    include 'listarPessoas.php'; 
    $valorBuscaSegura = htmlspecialchars($valorBusca);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Pessoas</title>
    <link rel="stylesheet" type="text/css" href="exer02.css">
    
</head>
<body>
    <h1>Lista de Pessoas Cadastradas</h1>
    <form method="get" action="exer02.php">
        <input type="text" name="busca" placeholder="Buscar por nome" value="<?= $valorBuscaSegura ?>">
        <input type="submit" value="Pesquisar">
        <input type="button" value="Limpar" onclick="location.href='exer01.php'">
    </form>
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
