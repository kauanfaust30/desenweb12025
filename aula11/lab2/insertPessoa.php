<?php
 define("DB_HOST", "localhost");
 define("DB_PORT", "5432");
 define("DB_NAME", "local"); 
 define("DB_USER", "postgres");
 define("DB_PASS", "Kauan30112005@");

 $connectionString = "host=".DB_HOST." port=".DB_PORT." dbname=".DB_NAME." user=".DB_USER." password=".DB_PASS;

//estabelecer conexao
    $condb = pg_connect($connectionString);
    if(!$condb){
        echo "Erro: Nao foi possivel conectar ao banco de dados.";
    } else {
        echo "Conexao estabelecida com sucesso!<br>";

        //executar uma consulta
        $result = pg_query($condb, "SELECT count(*) as QTDTABS FROM pg_tables");
        while ($row = pg_fetch_assoc($result)) {
            echo "Quantidade de tabelas no banco de dados: " . $row['qtdtabs'] . "<br>";
        }   
        //inserir dados tabela pessoa
        $aDados = array( $_POST['nome'], $_POST['sobrenome'], $_POST['email'],$_POST['senha'], $_POST['cidade'], $_POST['estado']);

        $result = pg_query_params($condb, "INSERT INTO TBPESSOA (PESNOME, PESSOBRENOME, PESEMAIL,PESPASSWORD, PESCIDADE, PESESTADO) 
                                                VALUES ($1, $2, $3, $4, $5, $6)", 
                                            $aDados);

        if($result){
            echo "Dados inseridos com sucesso!";
        }
    }
    echo "<br><input type='button' value='Voltar' href=cadpessoa.php'>   ";
   echo "<input type='submit' value='Listar Pessoas' onclick='listarPessoas()'><br><br>";
?>