<?php
    define('arquivo', 'dados.txt');
    define('arquivo2', 'dados2.txt');

    if(file_exists(arquivo)){
        echo "Arquivo existe";

        $conteudo = file_get_contents(arquivo);
        echo "<br>Conteudo do arquivo:<br>";
        echo nl2br($conteudo);

        //escrever em um novo arquivo
        $conteudoNovo = serialize($conteudo);
        file_put_contents(arquivo2, $conteudoNovo);
        echo "<br>Conteudo escrito no novo arquivo 'dados2.txt'.";

    }