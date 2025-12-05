<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Dashboard Administrativo</title>

  <link rel="stylesheet" href="css/dashboard.css">
  <link rel="stylesheet" href="css/menu.css">

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

  <!-- IMPORTA O MENU LATERAL -->
  <?php include "menu.php"; ?>

  <main class="app">

    <header class="topbar">
      <div class="title">
        <h1>Painel Administrativo</h1>
      </div>
      <div class="actions">
        <a href="../src/logout.php" class="btn ghost">Sair</a>
      </div>
    </header>

    <!-- CARDS SUPERIORES -->
    <section class="summary-grid">
      <div class="card glass">
        <div class="card-head">Média Geral</div>
        <div id="mediaGeral" class="card-value">—</div>
        <div class="card-note">Média das notas (0–10)</div>
      </div>

      <div class="card glass">
        <div class="card-head">Total de Avaliações</div>
        <div id="totalAvaliacoes" class="card-value">—</div>
        <div class="card-note">Registros submetidos</div>
      </div>
    </section>

    <section class="dashboard-charts">
      <div class="chart-box">
          <h2>Média por Setor</h2>
          <canvas id="graficoSetores"></canvas>
      </div>
    </section>

    <footer class="footer">
      Sistema de Avaliação — Retaguarda
    </footer>

  </main>

  <script src="js/dashboard.js"></script>
</body>
</html>
