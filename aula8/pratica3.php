<?php
    $salario1 = 1000;
    $salario2 = 2000;

    $salario2 = $salario1;

    $salario2++;

    $salario1 *= 1.1;

    echo "Valor Salário 1: $salario1, Valor Salario 2: $salario2";

    echo "<br>";
    echo "<br>";

    if($salario1 > $salario2){
       echo "O Valor da variável 1 é maior que o valor da variável 2";
    } elseif($salario1 < $salario2){
        echo "O Valor da variável 1 é menor que o valor da variável 2";
    } else{
        echo "Os valores são iguais";
    };
?>