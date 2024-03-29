<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>html-css-partePHP</title>
</head>
<body>
    <main class="caixas">
        Welcome <?php echo $_GET["name"]; ?>
        <br>
        Your email address is: <?php echo $_GET["email"]; ?>
        <br>
        <?php
            $valor = $_GET["v"];
            $rq = sqrt($valor);
            echo "a raiz quadrada de $valor e igual a " . number_format($rq,2);
        ?>
    </main>
</body>
</html>