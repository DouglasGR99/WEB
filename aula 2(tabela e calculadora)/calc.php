<?php 
    //realizar operações
    //esse dá pra comentar em portugues tranquilo
    include("./calculadora.php");

        $v1 = $_POST('txtv1');
        $v2 = $_POST('txtv2');
        $op = $_POST('operacao');

    //vou tentar usar um switch case apos resolver o bug
    if ($_POST) {
        if ($op == 'somar') {
            $result = $v1 + $v2;
            echo $result;
        }   elseif ($op == 'subtrair') {
            $result = $v1 - $v2;
            echo $result;
        }   elseif ($op == 'multiplicar') {
            $result = $v1 * $v2;
            echo $result;
        }   elseif ($op == 'dividir') {
            $result = $v1 / $v2;
            echo $result;
        }
    }
?>