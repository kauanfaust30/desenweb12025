<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 3</title>
</head>
<body>
   <h3>Exercício 3</h3>
    <form method="post">
        <label for="lado">Informe o lado do quadrado:</label>
        <input type="number" id="lado" name="lado" step="0.01" required><br><br>

        <input type="submit" value="Enviar"><br><br>
    </form> 
</body>
</html>
<?php
    $lado = floatval($_POST['lado'] ?? 0);

    function calcularArea($l) {
        return $l * $l;
    }

    $area = calcularArea($lado);
    echo "<div>A área do quadrado de lado " . $lado . " metros é: " . $area . " metros quadrados</div>";
