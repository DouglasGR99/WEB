<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Questão Optativa (PHP JSON)</title>
</head>
<body>
<main class="caixas">
    <h1>Criar Questão Optativa (PHP JSON)</h1>
    <nav>
        <a href="OPTAindex.php"><button class="botaoBonito pagInicio">Voltar a pag Inicial</button></a>
    </nav>
    <br>
    <form action="OPTAcreate.php" method="POST">
        Índice: <label>
            <input type="text" id="id" name="id">
        </label>
        Pergunta: <label>
            <input type="text" id="pergunta" name="pergunta">
        </label>
        <br>
        Alternativa 1 (a): <label>
            <input type="text" id="alt1" name="alt1">
        </label>
        Alternativa 2 (b): <label>
            <input type="text" id="alt2" name="alt2">
        </label>
        Alternativa 3 (c): <label>
            <input type="text" id="alt3" name="alt3">
        </label>
        Alternativa 4 (d): <label>
            <input type="text" id="alt4" name="alt4">
        </label>
        Alternativa 5 (e): <label>
            <input type="text" id="alt5" name="alt5">
        </label>
        Gabarito: <label>
            <input type="text" id="gabarito" name="gabarito">
        </label>
        <br>
        <input type="submit" name="salvar" value="Criar Questão" class="botaoBonito botaoArquivo">
    </form>
</main>

<?php
if (isset($_POST['salvar'])) {
    // abre o arquivo perguntas.json
    $dados = file_get_contents('ARQoptativas.json');
    $dados = json_decode($dados);

    // dados do formulário
    $novaQuestao = array(
        'id' => $_POST['id'],
        'pergunta' => $_POST['pergunta'],
        'alt1' => $_POST['alt1'],
        'alt2' => $_POST['alt2'],
        'alt3' => $_POST['alt3'],
        'alt4' => $_POST['alt4'],
        'alt5' => $_POST['alt5'],
        'gabarito' => "(" . $_POST['gabarito'] . ")"
    );

    // adiciona os dados do formulário no array
    $dados[] = $novaQuestao;

    // salva os dados no arquivo perguntas.json
    $dados = json_encode($dados, JSON_PRETTY_PRINT);
    file_put_contents('ARQoptativas.json',$dados);

    header("Location: OPTAindex.php");
    exit();
}
else {
    echo "Preencha todos os campos";
}
?>
</body>
</html>