<?php 
    include("./calculadora.php");

    $v1 = $_POST["txtv1"];
    $v2 = $_POST["txtv2"];
    $op = $_POST["operacao"];

    $resultado = "";

    if ($_POST) {
        if ($op == 'somar') {
            $resultado = $v1 + $v2;
        } elseif ($op == 'subtrair') {
            $resultado = $v1 - $v2;
        } elseif ($op == 'multiplicar') {
            $resultado = $v1 * $v2;
        } elseif ($op == 'dividir') {
            $resultado = $v1 / $v2;
        }
    }
?>
