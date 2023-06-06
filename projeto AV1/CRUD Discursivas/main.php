<?php

if (isset($_POST['id']) && isset($_POST['pergunta']) && isset($_POST['resposta'])) {
    // abre o arquivo ARQdiscursivas.json
    $dados = file_get_contents('ARQdiscursivas.json');
    $dados = json_decode($dados, true);

    // dados do formulário
    $novaQuestao = array(
        'id' => $_POST['id'],
        'pergunta' => $_POST['pergunta'],
        'resposta' => $_POST['resposta']
    );

    // adiciona os dados do formulário no array
    $dados[] = $novaQuestao;

    // salva os dados no arquivo ARQdiscursivas.json
    file_put_contents('ARQdiscursivas.json', json_encode($dados, JSON_PRETTY_PRINT));

    // Retorna uma resposta de sucesso
    http_response_code(200);
} else {
    // Retorna uma resposta de erro
    http_response_code(400);
}
