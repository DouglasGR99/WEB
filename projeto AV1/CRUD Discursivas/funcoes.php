<?php
require 'conectaDIS.php';

function inserirDados($enunciado, $resposta) {
    global $connect;

    // Insira os dados no banco de dados
    $sql = "INSERT INTO discursivas (enunciado, resposta) VALUES (:enunciado, :resposta)";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(':enunciado', $enunciado);
    $stmt->bindParam(':resposta', $resposta);
    $stmt->execute();

    echo 'Dados inseridos com sucesso!';
}

// Recupere os dados JSON enviados
$data = json_decode(file_get_contents('php://input'), true);

// Acesse os valores dos campos do formulário
$enunciado = $data['enunciado'];
$resposta = $data['resposta'];

// Chame a função para inserir os dados
inserirDados($enunciado, $resposta);
?>
