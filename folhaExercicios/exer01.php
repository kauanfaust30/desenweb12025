<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 01</title>
</head>
<body>
    <h3>Exercício 01</h3>
    <form method="get">
        <label for="valor1">Primeiro valor:</label>
        <input type="number" id="valor1" name="valor1" require><br><br>

        <label for="valor2">Segundo valor:</label>
        <input type="number" id="valor2" name="valor2" require><br><br>  
        
        <label for="valor3">Terceiro valor:</label>
        <input type="number" id="valor3" name="valor3" require ><br><br>

        <input type="submit" value="Enviar"><br><br>
    </form> 
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $valor1 = $_GET['valor1'] ?? 0;
        $valor2 = $_GET['valor2'] ?? 0; 
        $valor3 = $_GET['valor3'] ?? 0;

        function soma($a, $b, $c) {
            return $a + $b + $c;
        }
        $resultado = soma($valor1, $valor2, $valor3);

        function escreverResultado($a, $b, $c, $res) {
            if ($res > 10) {
                echo  "<span style='color: blue;'>" . $res . "</span> ";
            } 
            else if ($b < $c){
                echo "<span style='color: green;'>" . $res . "</span> ";
            } 
            else if ($c < $a and $c < $b){
                echo "<span style='color: red;'>" . $res . "</span>  ";
            }
        }

                echo "<div>O valor da soma é = " ;
                echo escreverResultado($valor1, $valor2, $valor3, $resultado) . "</div>";
    }       
?>

