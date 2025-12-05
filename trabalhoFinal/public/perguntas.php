<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
  header("Location: login.php");
  exit;
}
require "../src/conexao.php";
$rows = $pdo->query("SELECT * FROM pergunta ORDER BY pergunta_id")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<title>Gerenciar Perguntas</title>
<link rel="stylesheet" href="css/perguntas.css">
</head>
<body>

<div class="content">
  <h1>Perguntas</h1>

  <form action="../src/perguntas_crud.php" method="post">
    <input type="text" name="texto" placeholder="Nova pergunta..." required>
    <select name="setor_id">
      <?php
      $setores = $pdo->query("SELECT * FROM setor")->fetchAll();
      foreach($setores as $s){
        echo "<option value='{$s['setor_id']}'>{$s['nome_setor']}</option>";
      }
      ?>
    </select>
    <button type="submit" name="acao" value="criar">Criar</button>
  </form>

  <table>
    <tr><th>ID</th><th>Pergunta</th><th>Setor</th><th>Ações</th></tr>
    <?php foreach($rows as $r): ?>
      <tr>
        <td><?= $r['pergunta_id'] ?></td>
        <td><?= $r['texto_pergunta'] ?></td>
        <td><?= $r['setor_id'] ?></td>
        <td>
          <a href="../src/perguntas_crud.php?del=<?= $r['pergunta_id'] ?>">Excluir</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
  <input type="button" value="← Voltar" onclick="window.location.href='admin_dashboard.php'">
</div>
</body>
</html>
