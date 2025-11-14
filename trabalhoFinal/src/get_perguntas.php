<?php
require_once __DIR__ . "/conexao.php";
header("Content-Type: application/json; charset=utf-8");

try {
    $sql = "
        SELECT
          p.pergunta_id,
          p.texto_pergunta,
          p.setor_id,
          s.nome_setor,
          s.dispositivo_id AS dispositivo_id,
          d.nome_dispositivo AS nome_dispositivo
        
        FROM pergunta p
        JOIN setor s ON s.setor_id = p.setor_id
        LEFT JOIN dispositivo d ON d.dispositivo_id = s.dispositivo_id

        WHERE p.status = 'ativa'
        ORDER BY p.setor_id, p.pergunta_id;
    ";

    $stmt = $pdo->query($sql);
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($dados, JSON_UNESCAPED_UNICODE);

} catch (PDOException $e) {
    echo json_encode(["erro" => $e->getMessage()]);
}
?>
