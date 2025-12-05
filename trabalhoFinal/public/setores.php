<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
  header("Location: login.php");
  exit;
}
require "../src/conexao.php";
$setores = $pdo->query("SELECT * FROM setor")->fetchAll();
$disp = $pdo->query("SELECT * FROM dispositivo")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
<title>Setores & Dispositivos</title>
<link rel="stylesheet" href="css/setores.css">
</head>
<body>

<div class="content">
  <h1>Setores</h1>

  <form action="../src/setores_crud.php" method="post">
    <input type="text" name="nome" placeholder="Nome do setor" required>
    <button type="submit" name="acao" value="criar">Criar</button>
  </form>

  <table>
    <tr><th>ID</th><th>Nome</th></tr>
    <?php foreach($setores as $s): ?>
      <tr>
        <td><?= $s['setor_id'] ?></td>
        <td><?= $s['nome_setor'] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

  <h1>Dispositivos</h1>

  <form action="../src/setores_crud.php" method="post">
    <input type="text" name="dispositivo" placeholder="Nome do tablet" required>
    <button type="submit" name="acao" value="criar_disp">Criar</button>
  </form>

  <table>
    <tr><th>ID</th><th>Nome</th></tr>
    <?php foreach($disp as $d): ?>
      <tr>
        <td><?= $d['dispositivo_id'] ?></td>
        <td><?= $d['nome_dispositivo'] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
  <input type="button" value="← Voltar" onclick="window.location.href='admin_dashboard.php'"> 
</div>

</body>
</html>
