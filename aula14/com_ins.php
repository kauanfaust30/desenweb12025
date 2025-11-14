<?php   
    require_once 'computador.php';

    $comp = new computador();
    $comp->ligar();

    echo "Status do computador: " . $comp->getStatus();

    $comp->desligar();
    echo "<br>Status do computador: " . $comp->getStatus();

    $comp->ligar();
    echo "<br>Status do computador: " . $comp->getStatus();