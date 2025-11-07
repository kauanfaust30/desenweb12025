<?php
$arquivo = "pessoas.json";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pessoa = [
        "nome" => $_POST['nome'] ?? '',
        "sobrenome" => $_POST['sobrenome'] ?? '',
        "email" => $_POST['email'] ?? '',
        "senha" => $_POST['senha'] ?? '',
        "cidade" => $_POST['cidade'] ?? '',
        "estado" => $_POST['estado'] ?? ''
    ];

    if (file_exists($arquivo)) {
        $conteudo = file_get_contents($arquivo);
        $listaPessoas = json_decode($conteudo, true);
    } else {
        $listaPessoas = [];
    }

    $listaPessoas[] = $pessoa;

    $json = json_encode($listaPessoas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    file_put_contents($arquivo, $json);

    echo "<h2>Pessoa cadastrada com sucesso!</h2>";
    echo "<p>Arquivo atualizado: <strong>$arquivo</strong></p>";
    echo "<p>Total de pessoas cadastradas: " . count($listaPessoas) . "</p>";

    echo "<br><input type='button' value='Voltar' onclick=\"location.href='cadpessoa.html'\">";
} else {
    echo "Nenhum dado foi enviado.";
}
?>
