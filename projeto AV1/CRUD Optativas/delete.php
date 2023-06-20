<?php
// delete.php
$connect = new PDO("mysql:host=localhost;dbname=questoesdaw", "root", "mySql1199");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $sql = "DELETE FROM optativas WHERE id = :id";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}
?>
