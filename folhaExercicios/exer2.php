<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exercicio 2</title>
</head>
<body>
   <h3>Exercício 2</h3>
   <form method="get">
       <label>Digite um número:</label>
       <input type="number" name="num" required><br><br>

       <input type="submit" value="Enviar"><br><br>
    </form>
</body>
</html>
<?php
    $num = $_GET['num'] ?? 0;

    function verificarDivisao($n,$d) {
        if ($n % $d == 0) {
            echo "<div>O valor é divisível por $d</div>";
        } else {
           echo "<div>O valor não é divisível por $d</div>";
        }
    }

    verificarDivisao($num,2);
?>