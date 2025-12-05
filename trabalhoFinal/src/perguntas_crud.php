<?php
require "conexao.php";

if (isset($_POST['acao']) && $_POST['acao'] === 'criar') {
  $stmt = $pdo->prepare("INSERT INTO pergunta (texto_pergunta, setor_id, status) VALUES (:t, :s, 'ativa')");
  $stmt->execute([
    ':t' => $_POST['texto'],
    ':s' => $_POST['setor_id']
  ]);

  header("Location: ../public/perguntas.php");
  exit;
}

if (isset($_GET['del'])) {
  $stmt = $pdo->prepare("DELETE FROM pergunta WHERE pergunta_id = :id");
  $stmt->execute([':id' => $_GET['del']]);

  header("Location: ../public/perguntas.php");
  exit;
}
