<?php
require 'conectaOPT.php';

function inserirDados($enunciado, $opca, $opcb, $opcc, $opcd, $gabarito) {
    global $connect;

    $sql = "INSERT INTO optativas (enunciado, a, b, c, d, gabarito) VALUES (:enunciado, :opca, :opcb, :opcc, :opcd, :gabarito)";
    $stmt = $connect->prepare($sql); // prepara a query para ser executada
    $stmt->bindParam(':enunciado', $enunciado);
    $stmt->bindParam(':opca', $opca);
    $stmt->bindParam(':opcb', $opcb);
    $stmt->bindParam(':opcc', $opcc);
    $stmt->bindParam(':opcd', $opcd);
    $stmt->bindParam(':gabarito', $gabarito);
    $stmt->execute();

    echo 'Dados inseridos com sucesso!';
}

function excluirRegistro($id) {
    global $connect;

    $sql = "DELETE FROM optativas WHERE id = :id";
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
    $opca = $data['opca'];
    $opcb = $data['opcb'];
    $opcc = $data['opcc'];
    $opcd = $data['opcd'];
    $gabarito = $data['gabarito'];

    inserirDados($enunciado, $opca, $opcb, $opcc, $opcd, $gabarito);
}
?>
