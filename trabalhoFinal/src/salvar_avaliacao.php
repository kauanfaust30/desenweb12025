<?php
require_once "conexao.php";
header('Content-Type: application/json; charset=utf-8');

$data = json_decode(file_get_contents("php://input"), true);

if(!$data || empty($data['avaliacoes'])){
    http_response_code(400);
    echo json_encode(["erro" => "Nenhum dado recebido."]);
    exit;
}

try {
    $sql = "INSERT INTO avaliacao (setor_id, pergunta_id, dispositivo_id, resposta, feedback_textual, datahora)
            VALUES (:setor, :pergunta, :dispositivo, :resposta, :feedback, CURRENT_TIMESTAMP)";
    $stmt = $pdo->prepare($sql);

    foreach($data['avaliacoes'] as $a){
        // validações básicas
        if(!isset($a['pergunta_id']) || !isset($a['setor_id']) || !isset($a['resposta'])){
            throw new Exception("Dados incompletos em uma das avaliações.");
        }

        $stmt->execute([
            ':setor' => (int)$a['setor_id'],
            ':pergunta' => (int)$a['pergunta_id'],
            ':dispositivo' => (int)($a['dispositivo_id'] ?? 1),
            ':resposta' => (int)$a['resposta'],
            ':feedback' => trim($a['feedback'] ?? "")
        ]);
    }

    echo json_encode(["sucesso" => true]);

} catch (PDOException $e) {
    echo json_encode(["erro" => "Erro no banco: " . $e->getMessage()]);
} catch (Exception $e) {
    echo json_encode(["erro" => $e->getMessage()]);
}
?>
