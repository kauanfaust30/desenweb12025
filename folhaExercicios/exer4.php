<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 3</title>
</head>
<body>
   <h3>Exercício 03</h3>
    <form method="post">
        <label for="base">Informe a base do retângulo:</label>
        <input type="number" id="base" name="base" step="0.01" required><br><br>

        <label for="altura">Informe a altura do retângulo:</label>
        <input type="number" id="altura" name="altura" step="0.01" required><br><br>

        <input type="submit" value="Enviar"><br><br>
    </form> 
</body>
</html>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {  
        $base = floatval($_POST['base'] ?? 0);
        $altura = floatval($_POST['altura'] ?? 0);
        
        function calcularArea($b, $h) {
            return $b * $h;
        }

        $area = calcularArea($base, $altura);

        function escreverArea($b, $h, $a) {
            if ($a > 10) {
                echo "<div><h1>A área do retângulo de base " . $b . " metros e altura " . $h . " metros é: " . $a . " metros quadrados</h1></div>";
            } else if ($a <= 10) {
                echo "<div><h3>A área do retângulo de base " . $b . " metros e altura " . $h . " metros é: " . $a . " metros quadrados</h3></div>";
            } else {
                echo " ";
            }

        }
        escreverArea($base, $altura, $area);
    }
?>