<html>
<head>
    <title>Prática 6 - Aula 8</title>
    <meta charset="utf-8">
</head>
<body>
<h3>Boletim</h3>

<table >
    <tr class="header">
        <th>Disciplina</th>
        <th>Faltas</th>  
        <th>Nota</th>
    </tr>   
        <?php
            $disciplina = array(
                            array("Matemática","5","8.5"),
                            array("Português","2","9"),
                            array("Geografia","10","6"),
                            array("Educação Física","2","8")
                    );

                    
            foreach($disciplina as $chave) {
                echo "<tr>";
                foreach($chave as $d) {
                    echo "<td>" . $d . "</td>";
                }
                echo "</tr>";
            }
        ?>
</table> 
<style>
    table, th, td {
        padding: 5px;
        align-items: left; 
        width: 40%;   
    }
    th, td {
        padding: 5px;
        text-align: left;       
    }
    body{
        display: flex;
        flex-direction: column; 
        align-items: center;    
    }
    h3{
        text-align: center; 
    }
    tr{
        background-color: #c2e1f6ff;    
    }
    .header {
        background-color: #4595dbff;
        color: white;
    }
</style>
</body>

</html>