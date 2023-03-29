<?php
    $Nomes = array("Douglas","Sapo","Rato","Azevedo");
    $Notas = array(7.9,8.1,10.0,0.0);
    $estado = "";    
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nome e nota</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<main class="caixas">
    <table>
        <tr>
            <th>Nome</th>
            <th>Nota</th>
            <th>Status</th>
        </tr>
        <?php for ($i=0; $i < 4; $i++) { ?>
        <tr>
            <td><?php echo $Nomes[$i] ?></td>
            <td><?php echo $Notas[$i] ?></td>
            <?php if ($Notas[$i]>8) {
                $estado = "aprovado";
            } else {
                $estado = "reprovado";
            }
             ?>
             <td class="<?php echo $estado?>">
                <?php echo $estado?>
             </td>
        </tr>
        <?php } ?>
    </table>
</main>
</body>
</html>