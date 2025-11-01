<?php
    require_once 'model/pessoa.php';
    
    $pessoaKauan= new Pessoa();
   $pessoaKauan->setNome("Kauan");
   $pessoaKauan->setSobrenome("Faust");
   $pessoaKauan->setDataNascimento("2000-01-01");
   $pessoaKauan->setCpfCnpj("301.120.055-00");
   $pessoaKauan->setTipo(1);
   $pessoaKauan->setTelefone("1234-5678");
   $pessoaKauan->setEndereco("Rua A, 123");

    echo $pessoaKauan->getNomeCompleto();

  /* $nome = "Kauan";
   $sobrenome = "Faust";

   function GetNomeCompleto($nome, $sobrenome) {
       return $nome . " " . $sobrenome;
   }

   echo GetNomeCompleto($nome, $sobrenome); */        