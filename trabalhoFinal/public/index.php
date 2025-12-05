<?php
$device_id = isset($_GET['device']) ? intval($_GET['device']) : null;

if (!$device_id) {
    die("
    <h2 style='color:black; font-family:Time News Roman; text-align:center; margin-top:40px;'>
        Erro: Nenhum dispositivo informado.<br>
        Utilize a URL assim: <code>?device=3</code>
    </h2>");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Avaliação de Serviços</title>
  <link rel="stylesheet" href="css/estilo.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
</head>
<body>
  <div class="app">
    <header class="header">
      <a href="login.php" class="login-icon">
        <span class="material-icons-round">login</span>
      </a>
      <h1>Avalie nosso serviço</h1>
    </header>

    <main class="card-wrapper">
      <div class="progress-bar"><div class="progress"></div></div>

      <div id="question-box" class="card"></div>
    </main>

    <div id="thankyou" class="thankyou hidden">
      <h2>O Estabelecimento agradece sua resposta!</h2>
      <p>Ela é muito importante para nós, pois nos ajuda a melhorar continuamente nossos serviços.</p>
    </div>
  </div>

  <!-- Envia o device_id para o script -->
  <script>
      const DEVICE_ID = <?= $device_id ?>;
  </script>

  <script src="js/script.js"></script>
</body>
</html>
