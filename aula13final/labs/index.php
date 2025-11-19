<?php
    require_once 'pessoa1.php';
    
    $pessoaKauan= new Pessoa1();
   $pessoaKauan->Nome("Kauan");
   $pessoaKauan->Sobrenome("Faust");
   $pessoaKauan->Cpf("301.120.055-00");
  

    echo $pessoaKauan->getNomeCompleto();

  /* $nome = "Kauan";
   $sobrenome = "Faust";

   function GetNomeCompleto($nome, $sobrenome) {
       return $nome . " " . $sobrenome;
   }

   echo GetNomeCompleto($nome, $sobrenome); */
?>        