<?php
require_once __DIR__ . '/../model/pessoa.php';
require_once __DIR__ . '/../model/contato.php';
require_once __DIR__ . '/../model/endereco.php';

$pessoas = [];

$p1 = new Pessoa();
$p1->setNome("Ryan");
$p1->setSobrenome("Faust");
$p1->setDataNascimento("2014-04-24");
$end = new Endereco("Ribeirão Matilde", "", "", "Atalanta", "SC", "");
$p1->setEndereco($end);
$pessoas[] = $p1;

$p2 = new Pessoa();
$p2->setNome("Clodoaldo");
$p2->setSobrenome("Faust");
$p2->setDataNascimento("1979-01-26");
$p2->setCpfCnpj("032.930.539-55");
$end = new Endereco("Ribeirão Matilde", "", "", "Atalanta", "SC", "88410-000");
$p2->setEndereco($end);
$pessoas[] = $p2;

$p3 = new Pessoa();
$p3->setNome("Marijane");
$p3->setSobrenome("Senem Faust");
$p3->setDataNascimento("1981-10-10");
$end = new Endereco("Ribeirão Matilde", "", "", "Atalanta", "SC", "88410-000");
$p3->setEndereco($end);
$pessoas[] = $p3;

$p4 = new Pessoa();
$p4->setNome("Kauan");
$p4->setSobrenome("Faust");
$p4->setDataNascimento("2005-11-30");
$p4->setCpfCnpj("127.180.219-85");  
$end = new Endereco("Ribeirão Matilde", "", "", "Atalanta", "SC", "");
$p4->setEndereco($end);
$p4->addContato(new Contato(1, "kauan.faust@unidavi.edu.br"));
$p4->addContato(new Contato(2, "(47) 98914-8820"));
$pessoas[] = $p4;

$pessoasJson = array_map(function($pessoa) {
    return json_decode($pessoa->toJSON(), true);
}, $pessoas);

$jsonFinal = json_encode($pessoasJson, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

file_put_contents("pessoas.json", $jsonFinal);

echo "<h2>Arquivo 'pessoas.json' criado com sucesso!</h2>";

