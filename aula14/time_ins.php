<?php
    require_once 'model/time.php';


    $time = new Time();
    $time->setNome("Flamengo");
    $time->setAnoFundacao(1895);
    $time->addJogador("Giorgian de Arrascaeta", "Meia", "1994-06-01");
    $time->addJogador("Bruno Henrique", "Atacante", "1991-12-22");
    $time->addJogador("Gabriel Barbosa", "Atacante", "1996-08-30");
    $time->addJogador("Diego Alves", "Goleiro", "1985-06-24");

    echo "<h3>Time:</h3>";
    echo "Nome: " . $time->getNome() . "<br>";
    echo "Ano de Fundação: " . $time->getAnoFundacao() . "<br><br>";
    echo "<h3>Jogadores:</h3>";
    $time->listaJogadores();
?>
    