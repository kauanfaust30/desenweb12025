
<?php
    $num = 22500;
    $parc = intval(60);
    $valParc = 489.65;
    $juros = 0; 

    function calcularValorJuros($n,$p,$v,&$j) {
        $totalParc = $p * $v;
        $j = $totalParc - $n;
    }

    function escreverResultados($n,$p,$v,&$j){
        echo "<h2>Exercicio 7</h2>";
        echo "valor a vista: R$ " . number_format($n, 2, ',', '.') . "<br>";
        echo "valor da parcela: R$ " . number_format($v, 2, ',', '.') . "<br>";
        echo "número de parcelas: " . $p . "<br>";
        echo "valor total das parcelas: R$ " . number_format($p * $v, 2, ',', '.') . "<br>";
        echo "<b>valor dos juros: R$ " . number_format($j, 2, ',', '.') . "<b><br>";
    }

    calcularValorJuros($num,$parc,$valParc,$juros);
    escreverResultados($num,$parc,$valParc,$juros);