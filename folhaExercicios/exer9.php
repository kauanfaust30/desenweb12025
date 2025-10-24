<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 9 - Juros composto</title>
</head>
<body>
    <h3>Exercício 09 </h3>
    <form action="exer9.php" method="post">
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
    $valorInicial = $_POST['valorInicial'] ?? 0;
    $qtd_parcelas = $_POST['qtd_parcelas'] ?? 1;
    $jurosComposto = 0;

    function descobrirJuros($parcelas) {
        switch ($parcelas) {
            case 24:
                return 0.020; 
            case 36:
                return 0.023; 
            case 48:
                return 0.026; 
            case 60:
                return 0.029; 
            default:
                return 0; 
        }
    }

    function calcularParcela($valor, $parcelas, $juros) {
        $valorComJuros = $valor * (1 + $juros) ** $parcelas;
        return $valorComJuros / $parcelas;
        
    }

    $jurosComposto = descobrirJuros($qtd_parcelas);
    $valorParcela = calcularParcela($valorInicial, $qtd_parcelas,$jurosComposto);

    echo "<div>Valor inicial: R$ " . number_format($valorInicial, 2, ',', '.') . "</div>";
    echo "<div>Quantidade de parcelas: " . $qtd_parcelas . "</div>";
    echo "<div>Taxa de juros aplicada: " . ($jurosComposto * 100) . "% ao mês</div>";
    echo "<div>O valor total a ser pago é: R$ " . number_format($valorParcela * $qtd_parcelas, 2, ',', '.') . "</div>";
    echo "<div><b>O valor de cada parcela é: R$ " . number_format($valorParcela, 2, ',', '.') . "</b></div>";