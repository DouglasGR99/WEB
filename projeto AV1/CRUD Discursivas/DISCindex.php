<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Pergunta Discursiva (PHP JSON)</title>
</head>
<body>
<main class="caixas">
    <h1>CRUD Pergunta Discursiva (PHP JSON)</h1>
    <nav>
        <a href="../CRUD%20Optativas"><button class="botaoBonito pagRead">Ir para Optativas</button></a>
        <a href="DISCcreate.php"><button class="botaoBonito pagCreate">Criar</button></a>
    </nav>
    <br>
    <table class="tabela">
        <tr>
            <th>Índice</th>
            <th>Pergunta</th>
            <th>Resposta</th>
            <th>Ação</th>
        </tr>
        <?php
            // Carrega o conteúdo do arquivo JSON em uma string
            $dados = file_get_contents('ARQdiscursivas.json');
            // Converte a string JSON em um array PHP
            $dados = json_decode($dados);

            $indice = 0;
            foreach ($dados as $dado) {
                echo "<tr>";
                echo "<td>" . $dado->id . "</td>";
                echo "<td>" . $dado->pergunta . "</td>";
                echo "<td>" . $dado->resposta . "</td>";
                echo "<td>";
                echo "<a href='DISCupdate.php?indice=$indice'><button class='botaoBonito pagUpdate'>Atualizar</button></a>";
                echo "<a href='DISCdelete.php?indice=$indice'><button class='botaoBonito pagDelete'>Excluir</button></a>";
                echo "</td>";
                echo "</tr>";
                $indice++;
            }
        ?>
    </table>
</main>
</body>
</html>