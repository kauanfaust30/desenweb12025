<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Avaliação de Serviços</title>
  <link rel="stylesheet" href="css/estilo.css" />
</head>
<body>
  <div class="app">
    <header class="header">
      <h1>Avalie nosso serviço</h1>
    </header>

    <main class="card-wrapper">
      <div class="progress-bar"><div class="progress"></div></div>

      <div id="question-box" class="card">
      
      </div>

      <div class="nav">
        <button id="prevBtn" class="btn secondary" disabled>← Voltar</button>
        <button id="nextBtn" class="btn primary">Próxima →</button>
      </div>

    </main>

    <div id="thankyou" class="thankyou hidden">
      <h2>O Estabelecimento agradece sua resposta!</h2>
      <p>Ela é muito importante para nós, pois nos ajuda a melhorar continuamente nossos serviços.</p>
    </div>
  </div>

  <script src="js/script.js"></script>
</body>
</html>
