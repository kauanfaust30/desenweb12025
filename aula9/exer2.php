<?php
    $pastas =array("bsn" =>
                array("3a Fase" =>
                    array("desenvWeb","bancoDados 1", "engSoft 1"),
                "4a Fase" =>
                     array("Intro Web","bancoDados 2", "engSoft 2"))
            );

    function listaPastas($pasta, int $nivel =1) {
        if(is_array($pasta)){
            foreach($pasta as $elemento => $valor){
                echo str_repeat("-",$nivel) . "$elemento <br>";

                listaPastas($valor,$nivel + 1);
            }
        } else {
            echo str_repeat("-",$nivel) . "$pasta <br>";
        }
    }
    listaPastas($pastas);
?>