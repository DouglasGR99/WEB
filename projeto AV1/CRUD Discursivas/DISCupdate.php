<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Pergunta Discursiva</title>
</head>
<body>
<?php
    // Coleta o id da URL
    $indice = $_GET['indice'];

    // Coleta o conteúdo do arquivo JSON
    $dados = file_get_contents('ARQdiscursivas.json');
    $dados = json_decode($dados);

    // Atribui os dados para o indice selecionado
    $dado = $dados[$indice];

    // Verifica se o formulário foi enviado
    if (isset($_POST['salvar'])) {
        $input = array(
            'id' => $_POST['id'],
            'pergunta' => $_POST['pergunta'],
            'resposta' => $_POST['resposta']
        );

        // Atualiza os dados do indice selecionado
        $dados[$indice] = $input;

        // Codifica os dados para formato JSON
        $dados = json_encode($dados, JSON_PRETTY_PRINT);
        file_put_contents('ARQdiscursivas.json', $dados);

        header('location: DISCindex.php');
    }
?>
<main class="caixas">
    <h1>Atualizar Pergunta Discursiva (PHP JSON)</h1>
    <nav>
        <a href="DISCindex.php"><button class="botaoBonito pagInicio">Voltar a pag Inicial</button></a>
    </nav><br>

    <form action="DISCupdate.php" method="post">
        Índice: <label> <input type="text" id="id" name="id" value="<?php echo $dado->id; ?>"> </label>
        Pergunta: <label> <input type="text" id="pergunta" name="pergunta" value="<?php echo $dado->pergunta; ?>"> </label>
        Resposta: <label> <input type="text" id="resposta" name="resposta" value="<?php echo $dado->resposta; ?>"> </label>
        <br><br>
        <input type="submit" name="salvar" value="Salvar" class="botaoBonito pagUpdate">
    </form>
</main>
</body>
</html>
