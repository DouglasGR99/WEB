<?php
// api.php
$connect = new PDO("mysql:host=localhost;dbname=questoesdaw", "root", "mySql1199");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enunciado = $_POST['enunciado'];
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $gabarito = $_POST['gabarito'];

    $sql = "INSERT INTO optativas (enunciado, a, b, c, d, gabarito) VALUES (:enunciado, :a, :b, :c, :d, :gabarito)";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(":enunciado", $enunciado);
    $stmt->bindParam(":a", $a);
    $stmt->bindParam(":b", $b);
    $stmt->bindParam(":c", $c);
    $stmt->bindParam(":d", $d);
    $stmt->bindParam(":gabarito", $gabarito);
    $stmt->execute();
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $connect->prepare("SELECT * FROM optativas");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($result);
}
?>