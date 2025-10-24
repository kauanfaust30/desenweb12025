<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 5</title>
</head>
<body>
    <h3>Exercício 05 </h3>
    <form method="post">
        <label>Base:</label>
        <input type="number" name="base" step="0.01" required><br><br>
        <label>Altura:</label>
        <input type="number" name="altura" step="0.01" required><br><br>
        <input type="submit" value="Calcular"><br>
    </form>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $base = floatval($_POST['base'] ?? 0);
        $altura = floatval($_POST['altura'] ?? 0);

        function areaTriangulo($b, $h) {
            return ($b * $h) / 2;
        }

        $area = areaTriangulo($base, $altura);
        echo "<h4>Área do triângulo: " . number_format($area, 2, ',', '.') . " m²</h4>";
    }
?>