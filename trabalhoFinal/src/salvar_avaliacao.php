<?php
require_once "conexao.php";
header('Content-Type: application/json; charset=utf-8');

$data = json_decode(file_get_contents("php://input"), true);

if (!$data || empty($data['avaliacoes'])) {
    http_response_code(400);
    echo json_encode(["erro" => "Nenhum dado recebido."]);
    exit;
}

try {
    // inicia transação
    $pdo->beginTransaction();

    // pega nextval da sequence (gera um envio_id atômico e seguro)
    $seqStmt = $pdo->query("SELECT nextval('avaliacao_envio_id_seq') AS novo");
    $novoEnvioID = $seqStmt->fetch(PDO::FETCH_ASSOC)['novo'];

    // prepara insert com envio_id
    $sql = "INSERT INTO avaliacao 
            (envio_id, setor_id, pergunta_id, dispositivo_id, resposta, feedback_textual, datahora)
            VALUES 
            (:envio, :setor, :pergunta, :dispositivo, :resposta, :feedback, CURRENT_TIMESTAMP)";
    $stmt = $pdo->prepare($sql);

    foreach ($data['avaliacoes'] as $a) {
        if (!isset($a['pergunta_id']) || !isset($a['setor_id']) || !isset($a['resposta'])) {
            throw new Exception("Dados incompletos em uma das avaliações.");
        }

        $stmt->execute([
            ':envio'       => $novoEnvioID,
            ':setor'       => (int)$a['setor_id'],
            ':pergunta'    => (int)$a['pergunta_id'],
            ':dispositivo' => (int)($a['dispositivo_id'] ?? 1),
            ':resposta'    => (int)$a['resposta'],
            ':feedback'    => trim($a['feedback'] ?? "")
        ]);
    }

    $pdo->commit();

    echo json_encode([
        "sucesso"  => true,
        "envio_id" => (int)$novoEnvioID
    ]);

} catch (PDOException $e) {
    if ($pdo->inTransaction()) $pdo->rollBack();
    http_response_code(500);
    echo json_encode(["erro" => "Erro no banco: " . $e->getMessage()]);
} catch (Exception $e) {
    if ($pdo->inTransaction()) $pdo->rollBack();
    http_response_code(400);
    echo json_encode(["erro" => $e->getMessage()]);
}
?>
