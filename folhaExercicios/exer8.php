<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 08</title>
</head>
<body>
    <h3>Exercicio 08</h3>
    <form action="exer8.php" method="post">
        <label>Informe o valor inicial:</label>
        <input type="number" id="valorInicial" name="valorInicial" require><br><br>

        <label>Escolha em quantas vezes deseja parcelar:</label>
        <select id=qtd_parcelas name=qtd_parcelas>
            <option value=24>24 vezes</option>
            <option value=36>36 vezes</option>
            <option value=48>48 vezes</option>
            <option value=60>60 vezes</option>
        </select><br><br>

        <input type="submit" value="Calcular"><br><br>
    </form>
</body>
</html>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {  
        $valorInicial = $_POST['valorInicial'] ?? 0;
        $qtd_parcelas = $_POST['qtd_parcelas'] ?? 1;
        $jurosSimples = 0;

        function descobrirJuros($parcelas) {
            switch ($parcelas) {
                case 24:
                    return 0.015; 
                case 36:
                    return 0.020; 
                case 48:
                    return 0.025; 
                case 60:
                    return 0.030; 
                default:
                    return 0; 
            }
        }

        function calcularParcela($valor, $parcelas, $juros) {
            $valorComJuros = $valor + ($valor * $juros * $parcelas);
            return $valorComJuros / $parcelas;
            
        }

        $jurosSimples = descobrirJuros($qtd_parcelas);
        $valorParcela = calcularParcela($valorInicial, $qtd_parcelas,$jurosSimples);

        echo "<div>Valor inicial: R$ " . number_format($valorInicial, 2, ',', '.') . "</div>";
        echo "<div>Quantidade de parcelas: " . $qtd_parcelas . "</div>";
        echo "<div>Taxa de juros aplicada: " . ($jurosSimples * 100) . "% ao mês</div>";
        echo "<div>O valor total a ser pago é: R$ " . number_format($valorParcela * $qtd_parcelas, 2, ',', '.') . "</div>";
        echo "<div><b>O valor de cada parcela é: R$ " . number_format($valorParcela, 2, ',', '.') . "</b></div>";
    }
?>