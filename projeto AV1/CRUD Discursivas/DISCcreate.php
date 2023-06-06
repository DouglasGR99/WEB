<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Questão Discursiva (PHP JSON)</title>
</head>
<body>
<main class="caixas">
    <h1>Criar Questão Discursiva (PHP JSON)</h1>
    <nav>
        <a href="DISCindex.php"><button class="botaoBonito pagInicio">Voltar a pag Inicial</button></a>
    </nav>
    <br>
    <form method="POST" onsubmit="cria()">
        Índice: <label>
            <input type="text" id="id" name="id">
        </label>
        Pergunta: <label>
            <input type="text" id="pergunta" name="pergunta">
        </label>
        Resposta: <label>
            <input type="text" id="resposta" name="resposta">
        </label>
        <input type="submit" name="salvar" value="Criar Questão" class="botaoBonito botaoArquivo">
    </form>
</main>

<?php
/*    if (isset($_POST['salvar'])) {
        // abre o arquivo perguntas.json
        $dados = file_get_contents('ARQdiscursivas.json');
        $dados = json_decode($dados);

        // dados do formulário
        $novaQuestao = array(
            'id' => $_POST['id'],
            'pergunta' => $_POST['pergunta'],
            'resposta' => $_POST['resposta']
        );

        // adiciona os dados do formulário no array
        $dados[] = $novaQuestao;

        // salva os dados no arquivo perguntas.json
        $dados = json_encode($dados, JSON_PRETTY_PRINT);
        file_put_contents('ARQdiscursivas.json',$dados);

        header("Location: DISCindex.php");
        exit();
    }
    else {
        echo "Preencha todos os campos";
    }
*/?>
</body>
</html>