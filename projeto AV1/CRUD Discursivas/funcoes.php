<?php
require 'conectaDIS.php';

function inserirDados($enunciado, $resposta) {
    global $connect;

    $sql = "INSERT INTO discursivas (enunciado, resposta) VALUES (:enunciado, :resposta)";
    $stmt = $connect->prepare($sql); // prepara a query para ser executada
    $stmt->bindParam(':enunciado', $enunciado);
    $stmt->bindParam(':resposta', $resposta);
    $stmt->execute();

    echo 'Dados inseridos com sucesso!';
}

function excluirRegistro($id) {
    global $connect;

    $sql = "DELETE FROM discursivas WHERE id = :id";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    echo 'Registro excluído com sucesso!';
}

if (isset($_GET['delete_id'])) { // Se o ID a ser excluído foi enviado
    $id = $_GET['delete_id'];
    excluirRegistro($id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Se os dados foram enviados via POST
    $data = json_decode(file_get_contents('php://input'), true);

    $enunciado = $data['enunciado'];
    $resposta = $data['resposta'];

    inserirDados($enunciado, $resposta);
}
?>
