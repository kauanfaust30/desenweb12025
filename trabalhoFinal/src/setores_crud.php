<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../public/login.php");
    exit;
}

require "conexao.php";

// Se não existir ação, apenas volta
if (!isset($_POST["acao"]) && !isset($_GET["del_setor"]) && !isset($_GET["del_disp"])) {
    header("Location: ../public/setores.php");
    exit;
}

// -----------------------------
// CRIAR SETOR
// -----------------------------
if (isset($_POST["acao"]) && $_POST["acao"] === "criar") {

    $nome = trim($_POST["nome"]);

    if ($nome !== "") {
        $sql = $pdo->prepare("INSERT INTO setor (nome_setor) VALUES (:n)");
        $sql->bindValue(":n", $nome);
        $sql->execute();
    }

    header("Location: ../public/setores.php");
    exit;
}



// -----------------------------
// CRIAR DISPOSITIVO
// -----------------------------
if (isset($_POST["acao"]) && $_POST["acao"] === "criar_disp") {

    $nomeD = trim($_POST["dispositivo"]);

    if ($nomeD !== "") {
        $sql = $pdo->prepare("INSERT INTO dispositivo (nome_dispositivo) VALUES (:d)");
        $sql->bindValue(":d", $nomeD);
        $sql->execute();
    }

    header("Location: ../public/setores.php");
    exit;
}



// -----------------------------
// EXCLUIR SETOR (opcional)
// -----------------------------
if (isset($_GET["del_setor"])) {

    $id = intval($_GET["del_setor"]);

    $sql = $pdo->prepare("DELETE FROM setor WHERE setor_id = :id");
    $sql->bindValue(":id", $id);
    $sql->execute();

    header("Location: ../public/setores.php");
    exit;
}



// -----------------------------
// EXCLUIR DISPOSITIVO (opcional)
// -----------------------------
if (isset($_GET["del_disp"])) {

    $id = intval($_GET["del_disp"]);

    $sql = $pdo->prepare("DELETE FROM dispositivo WHERE dispositivo_id = :id");
    $sql->bindValue(":id", $id);
    $sql->execute();

    header("Location: ../public/setores.php");
    exit;
}

?>
