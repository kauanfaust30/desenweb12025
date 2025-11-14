<?php
    require_once 'model/pessoa.php';
    require_once 'model/contato.php';

    $pessoa = new Pessoa();
    $pessoa->setNome("Kauan");
    $pessoa->setSobrenome("Faust");
    $pessoa->setDataNascimento("2005-11-30");
    $pessoa->setCpfCnpj("127.180.219-85");
    $pessoa->setTipo(1);
    $pessoa->setEndereco("Ribeirão Matilde - Atalanta/SC");

    $contato1 = new Contato(1, "kauan.faust@unidavi.edu.br");
    $contato2 = new Contato(2, "(47) 98825-1529");

    $pessoa->addContato($contato1);
    $pessoa->addContato($contato2);

    echo "Nome completo: " . $pessoa->getNomeCompleto() . "<br>";
    echo "Idade: " . $pessoa->getIdade() . " anos<br>";
    echo "CPF/CNPJ: " . $pessoa->getCpfCnpj() . "<br>";
    echo "Tipo: " . $pessoa->getTipo() . "<br>";
    echo "Endereço: " . $pessoa->getEndereco() . "<br>";

    echo "Contatos:<br>";
    echo $pessoa->getContatosToString();

    echo "JSON:<pre>" . $pessoa->toJSON() . "</pre>";
?>
