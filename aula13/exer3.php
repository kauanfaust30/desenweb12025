<?php
require_once 'model/pessoa.php';
require_once 'model/contato.php';

$pessoas = [];

$p1 = new Pessoa();
$p1->setNome("Ryan");
$p1->setSobrenome("Faust");
$p1->setDataNascimento("2014-04-24");
$p1->setEndereco("Ribeirão Matilde - Atalanta/SC");
$pessoas[] = $p1;

$p2 = new Pessoa();
$p2->setNome("Clodoaldo");
$p2->setSobrenome("Faust");
$p2->setDataNascimento("1979-01-26");
$p2->setEndereco("Ribeirão Matilde - Atalanta/SC");
$pessoas[] = $p2;

$p3 = new Pessoa();
$p3->setNome("Marijane");
$p3->setSobrenome("Senem Faust");
$p3->setDataNascimento("1981-10-10");
$p3->setEndereco("Ribeirão Matilde - Atalanta/SC");
$pessoas[] = $p3;

$p4 = new Pessoa();
$p4->setNome("Kauan");
$p4->setSobrenome("Faust");
$p4->setDataNascimento("2005-11-30");
$p4->setEndereco("Rua das Couves, 25");
$p4->addContato(new Contato(1, "kauan.faust@unidavi.edu.br"));
$p4->addContato(new Contato(2, "(47) 99999-9999"));
$pessoas[] = $p4;

$pessoasJson = array_map(function($pessoa) {
    return json_decode($pessoa->toJson(), true);
}, $pessoas);

$jsonFinal = json_encode($pessoasJson, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

file_put_contents("pessoas.json", $jsonFinal);

echo "<h2>Arquivo 'pessoas.json' criado com sucesso!</h2>";
echo "<pre>$jsonFinal</pre>";
?>
