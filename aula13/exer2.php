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


    $texto = "codigo;nome;sobrenome;idade;endereco\n";
    $codigo = 1;

    foreach ($pessoas as $pessoa) {
        $texto .= sprintf(
            '%d;"%s";"%s";%d;"%s"%s',
            $codigo++,
            $pessoa->getNome(),
            $pessoa->getSobrenome(),
            $pessoa->getIdade(),
            $pessoa->getEndereco(),
            PHP_EOL
        );
    }

    file_put_contents("pessoas.txt", $texto);

    echo "<h3>Arquivo pessoas.txt criado com sucesso!</h3>";
    echo "<pre>$texto</pre>";
?>
