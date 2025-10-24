<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 06 </title>
</head>
<body>
    <h3>Exercício 06 </h3>

    <form method="post">
        <label>Maçã (R$/Kg):</label>
        <input type="number" name="preco_maca" step="0.01" required><br>
        <label>Quantidade(Kg):</label>
        <input type="number" name="qtd_maca" step="0.01" required><br><br>

        <label>Melancia (R$/Kg):</label>
        <input type="number" name="preco_melancia" step="0.01" required><br>
        <label>Quantidade(Kg):</label>
        <input type="number" name="qtd_melancia" step="0.01" required><br><br>

        <label>Laranja (R$/Kg):</label>
        <input type="number" name="preco_laranja" step="0.01" required><br>
        <label>Quantidade(Kg):</label>
        <input type="number" name="qtd_laranja" step="0.01" required><br><br>

        <label>Repolho (R$/Kg):</label>
        <input type="number" name="preco_repolho" step="0.01" required><br>
        <label>Quantidade(Kg):</label>
        <input type="number" name="qtd_repolho" step="0.01" required><br><br>

        <label>Cenoura (R$/Kg):</label>
        <input type="number" name="preco_cenoura" step="0.01" required><br>
        <label>Quantidade(Kg):</label>
        <input type="number" name="qtd_cenoura" step="0.01" required><br><br>

        <label>Batatinha (R$/Kg):</label>
        <input type="number" name="preco_batatinha" step="0.01" required><br>
        <label>Quantidade(Kg):</label>
        <input type="number" name="qtd_batatinha" step="0.01" required><br><br>

        <input type="submit" value="Calcular"><br><br>
    </form>
</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {  
    function calcularGasto($preco, $quantidade) {
        return $preco * $quantidade;
    }

    function calcularTotal() {
        return calcularGasto($_POST['preco_maca'], $_POST['qtd_maca']) +
            calcularGasto($_POST['preco_melancia'], $_POST['qtd_melancia']) +
            calcularGasto($_POST['preco_laranja'], $_POST['qtd_laranja']) +
            calcularGasto($_POST['preco_repolho'], $_POST['qtd_repolho']) +
            calcularGasto($_POST['preco_cenoura'], $_POST['qtd_cenoura']) +
            calcularGasto($_POST['preco_batatinha'], $_POST['qtd_batatinha']);
    }

    function exibirResultado($total, $dinheiro = 50) {
        echo "<h4>Total da compra: R$ " . number_format($total, 2, ',', '.') . "</h4>";

        if ($total > $dinheiro) {
            $falta = $total - $dinheiro;
            echo "<p style='color:red'>Faltou R$ " . number_format($falta, 2, ',', '.') . " para pagar tudo!</p>";
        } elseif ($total < $dinheiro) {
            $sobra = $dinheiro - $total;
            echo "<p style='color:blue'>Sobrou R$ " . number_format($sobra, 2, ',', '.') . ".</p>";
        } else {
            echo "<p style='color:green'>Perfeito! Gastou exatamente R$ 50,00!</p>";
        }
    }

    function executarCompra() {
        $total = calcularTotal();
        exibirResultado($total);
    }

     executarCompra();
}
?>
