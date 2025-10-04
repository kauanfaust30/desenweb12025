<?php
    $valor = $_GET['valor'];
    $desconto = $_GET['desconto'];

    $valorComDesconto = $valor - $desconto;

    echo "valor:" . $valor . "<br>";
    echo "desconto:" . $desconto . "<br>";
    echo "valor com desconto:" . $valorComDesconto;
?>