<?php
function calcularMedia($notas){
        $soma = 0;
        for ($i = 0; $i < count($notas); $i++){
            $soma += $notas[$i];
        }
        $mediaNotas = $soma / count($notas);
        return $mediaNotas;
    }

    function verificarAprovacaoeFrequencia($valor, $criterio) {
        if ($valor >= $criterio){
            return true;
        }
        return false;
    }

    function calcularFrequencia($aulas){
        $presencas = 0;
        for ($i = 0; $i < count($aulas); $i++){
            $presencas += $aulas[$i]; // 1 = presente, 0 = falta
        }
        $frequencia = ($presencas / count($aulas)) * 100;
        return $frequencia;
    }
?>
