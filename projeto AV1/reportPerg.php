<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Perguntas php</title>
</head>
<body>
<header class="caixas">
    <h1>Listar Perguntas</h1>
    <nav>
        <a href="pagInicial.html"><button class="botaoBonito pagInicio">Voltar a pag Inicial</button></a>
    </nav>
</header>

<main class="caixas">
    <?php
        $arcDisc = fopen("perguntas.txt", "r") or die("Erro ao ler arquivo");
        // r = read
        $cabecalho = explode(";", fgets($arcDisc));
        // fgets lê uma dado do arquivo e retorna uma string
    ?>
    <br>
    <table class='tabela'>
        <tr>
            <th class='tabela'><?php echo $cabecalho[0] ?></th>
            <th class='tabela'><?php echo $cabecalho[1] ?></th>
        </tr>
        <?php
        while (!feof($arcDisc)) {
            // enquanto não chegar no final do arquivo
            $linha = fgets($arcDisc);
            if (!empty($linha)) {
                // se a dado não estiver vazia
                $dados = explode(";", $linha);
                // explode separa a string em um array de strings
                echo "<tr>";
                for ($i = 0; $i < count($dados); $i++) {
                    // count conta o número de elementos de um array
                    echo "<td class='tabela'>" . $dados[$i] . "</td>";
                }
                echo "</tr>";
            }
        }
        ?>
    </table>
    <br>
    <?php fclose($arcDisc); ?>
</main>
</body>
</html>