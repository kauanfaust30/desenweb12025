<?php  
    require_once 'funçoes.php';

    $arrayNotas = array(8.5, 9, 7.75, 10, 8);

    $arrayFaltas = array(1, 0, 1, 1, 0, 1, 1, 0, 0, 1, 1, 1, 1, 0);

    $mediaNotas = calcularMedia($arrayNotas);
    $frequencia = calcularFrequencia($arrayFaltas);

    if(verificarAprovacaoeFrequencia($mediaNotas, 7)){
        echo "Aprovado por nota! <br>";
    } else {
        echo "Reprovado por nota! <br>";
    }

    if(verificarAprovacaoeFrequencia($frequencia, 70)){
        echo "Aprovado por frequência! <br>";
    } else {
        echo "Reprovado por frequência! <br>";
    }
?>
