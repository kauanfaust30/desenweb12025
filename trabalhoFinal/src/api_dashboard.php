<?php
header("Content-Type: application/json; charset=utf-8");
require_once __DIR__ . "/conexao.php";

try {
    // média por pergunta
    $sqlPerg = "
        SELECT p.pergunta_id, p.texto_pergunta,
               ROUND(AVG(a.resposta)::numeric,2) AS media
        FROM pergunta p
        LEFT JOIN avaliacao a ON a.pergunta_id = p.pergunta_id
        GROUP BY p.pergunta_id, p.texto_pergunta
        ORDER BY p.pergunta_id
    ";
    $media_perguntas = $pdo->query($sqlPerg)->fetchAll(PDO::FETCH_ASSOC);

    // média por setor
    $sqlSet = "
        SELECT s.setor_id, s.nome_setor,
               COUNT(a.avaliacao_id)::int AS respostas,
               ROUND(AVG(a.resposta)::numeric,2) AS media,
               COUNT(DISTINCT a.envio_id) AS envios
        FROM setor s
        LEFT JOIN avaliacao a ON a.setor_id = s.setor_id
        GROUP BY s.setor_id, s.nome_setor
        ORDER BY media DESC
    ";
    $media_setores = $pdo->query($sqlSet)->fetchAll(PDO::FETCH_ASSOC);

    // média geral e total (por envio)
    $sqlGeral = "
        SELECT 
            ROUND(AVG(resposta)::numeric, 2) AS media_geral,
            COUNT(DISTINCT envio_id) AS total_avaliacoes
        FROM avaliacao
        WHERE resposta IS NOT NULL
    ";
    $geral = $pdo->query($sqlGeral)->fetch(PDO::FETCH_ASSOC);

    // garantir tipos corretos
    $geral['media_geral'] = isset($geral['media_geral']) ? (float)$geral['media_geral'] : 0.0;
    $geral['total_avaliacoes'] = isset($geral['total_avaliacoes']) ? (int)$geral['total_avaliacoes'] : 0;

    echo json_encode([
        "media_setores"    => $media_setores,
        "media_perguntas"  => $media_perguntas,
        "media_geral"      => $geral['media_geral'],
        "total_avaliacoes" => $geral['total_avaliacoes']
    ], JSON_UNESCAPED_UNICODE);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["erro" => $e->getMessage()]);
}
