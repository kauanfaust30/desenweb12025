<?php
    require_once 'calculadora.php';

    $calc = new Calculadora();
    $calc->setA(10);
    $calc->setB(5);
    echo "Soma: " . $calc->somar() . "<br>";
    echo "Subtração: " . $calc->subtrair() . "<br>";
    echo "Multiplicação: " . $calc->multiplicar() . "<br>";
    echo "Divisão: " . $calc->dividir() . "<br>";
?>