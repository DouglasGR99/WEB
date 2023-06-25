<?php
global $connect;
require 'conectaDIS.php';

// Recupere os dados JSON enviados
$data = json_decode(file_get_contents('php://input'), true);

// Acesse os valores dos campos do formulário
$enunciado = $data['enunciado'];
$resposta = $data['resposta'];

// Insira os dados no banco de dados
$sql = "INSERT INTO discursivas (enunciado, resposta) VALUES (:enunciado, :resposta)";
$stmt = $connect->prepare($sql);
$stmt->bindParam(':enunciado', $enunciado);
$stmt->bindParam(':resposta', $resposta);
$stmt->execute();

echo 'Dados inseridos com sucesso!';
?>
