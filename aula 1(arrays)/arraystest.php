<?php
    $carro = array("volkswagen","nissan","fiat","alfaromeo","lamborghini");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Php arrays</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<main>
    <h1>My first PHP page</h1>
    <?php for ($i=0; $i < 5 ; $i++) { ?>
    <?php echo ("O meu $carro[$i] corre, corre e corre."); ?>  
    <br>
    <?php } ?> 
</main>
</body>
</html>