<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculadora php</title>
</head>
<body>
    <h1>Calculadora php</h1>
    <form action="calc.php" method="post" class="caixas">
        Valor 1: <input type="number" name="txtv1"><br>
        Valor 2: <input type="number" name="txtv2"><br>
        <select name="operacao">
            <option>somar</option>
            <option>subtrair</option>
            <option>multiplicar</option>
            <option>dividir</option>
        </select>
        <br>
        <input type="submit" value="Calcular">
    </form>

    <?php 
        include("calc.php");

        if (isset($resultado)) {
            echo "<p>O resultado é: $resultado</p>";
        }
    ?>
</body>
</html>
