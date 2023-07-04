<?php
require 'conectaDB.php';

function inserirDados($CPF, $nome, $cod_sala) {
    global $connect;

    $sql = "INSERT INTO fiscais (CPF, nome, cod_sala) VALUES (:CPF, :nome, :cod_sala)";
    $stmt = $connect->prepare($sql); // prepara a query para ser executada
    $stmt->bindParam(':CPF', $CPF);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cod_sala', $cod_sala);
    $stmt->execute();

    echo 'Dados inseridos com sucesso!';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Se os dados foram enviados via POST
    $data = json_decode(file_get_contents('php://input'), true);

    $CPF = $data['CPF'];
    $nome = $data['nome'];
    $cod_sala = $data['cod_sala'];

    inserirDados($CPF, $nome, $cod_sala);
}
?>