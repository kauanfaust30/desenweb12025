<?php
   $disciplinas = array("Estruturas de dados II", "Banco de Dados II",
   "Administração e Sistemas de Informação", "Engenharia de Software II", 
   "Programação Web I");

   $professores = array("Fernando", "Marco" ,"Marciel", "Jullian", "Cléber");

    for($i = 0; $i < 5; $i++) {
        echo "Disciplina: " . $disciplinas[$i] . "   professor: " . $professores[$i];
        echo "<br>";
    }
   
?>