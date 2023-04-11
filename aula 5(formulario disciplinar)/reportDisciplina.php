<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar disciplina php</title>
</head>
<body>
    <h1>Listar Disciplina</h1>
    <?php
        $arcDisc = fopen(filename "disciplinas.txt", mode "r") or die ("erro ao ler arquivo");
        // echo fgets($arcDisc);
        // echo "<br>";
        $cabecalho = explode(separator ";", fgets(arcDisc));
        // echo $cabecalho[0];
        echo "<br>";
        echo fgets($arcDisc);
        //ler fgets ate end of file (eof retornar true)
        while (!feof($arcDisc)) {
            echo fgets($arcDisc);
            echo "<br>";
        }
    ?>
    <br>
    <table style="border: 1px solid">
        <tr>
            <th style="border: 1px solid"><?php echo $cabecalho[0] ?></th>
            <th style="border: 1px solid"><?php echo $cabecalho[1] ?></th>
            <th style="border: 1px solid"><?php echo $cabecalho[2] ?></th>
        </tr>
        <tr>
            <td></td>
        </tr>
    </table>
</body>
</html>