<?php
    $pastas = array(
        "bsn" => array(
            "3a Fase" => array("desenvWeb", "bancoDados 1", "engSoft 1"),
            "4a Fase" => array("Intro Web", "bancoDados 2", "engSoft 2")
        )
    );

    function listaPastas($pasta, int $nivel = 1) {
        if (is_array($pasta)) {
            foreach ($pasta as $chave => $valor) {
                if (is_array($valor)) {
                    echo str_repeat("-", $nivel) . $chave . "<br>";
                    listaPastas($valor, $nivel + 1);
                } else {
                    echo str_repeat("-", $nivel) . $valor . "<br>";
                }
            }
        }
    }

    listaPastas($pastas);
?>
