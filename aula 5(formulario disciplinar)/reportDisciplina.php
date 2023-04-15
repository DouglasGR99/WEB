<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar disciplina php</title>
</head>
<body>
    <main class="caixas">
        <h1>Listar Disciplinas</h1>
        <?php
            $arcDisc = fopen("disciplinas.txt", "r") or die("Erro ao ler arquivo");
            // r = read
            $cabecalho = explode(";", fgets($arcDisc));
            // fgets lê uma linha do arquivo e retorna uma string
        ?>
        <br>
        <table class='tabela'>
            <tr>
                <th class='tabela'><?php echo $cabecalho[0] ?></th>
                <th class='tabela'><?php echo $cabecalho[1] ?></th>
                <th class='tabela'><?php echo $cabecalho[2] ?></th>
            </tr>
            <?php
            while (!feof($arcDisc)) {
                // enquanto não chegar no final do arquivo
                $linha = fgets($arcDisc);
                if (!empty($linha)) {
                    // se a linha não estiver vazia
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
        <form action="modificar.php" method="post">
            <input class="negativo botaoBonito botaoArquivo" type="submit" name="modificar" value="Remover Disciplina">
        </form>
        <a href="formularioDisciplina.php"><button class="botaoBonito botaoPagina">Voltar ao Formulário</button></a>
        <?php fclose($arcDisc); ?>
    </main>
</body>
</html>