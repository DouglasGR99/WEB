<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Questão Discursiva (PHP JSON)</title>
</head>
<body>
<?php
$indice = $_GET['indice'];

$dados = file_get_contents('ARQdiscursivas.json');
$data_array = json_decode($dados);

if(isset($_POST['salvar'])){
    $input = array(
        'id' => $_POST['id'],
        'pergunta' => $_POST['pergunta'],
        'resposta' => $_POST['resposta']
    );

    $data_array[$indice] = $input;

    $dados = json_encode($data_array, JSON_PRETTY_PRINT);
    file_put_contents('ARQdiscursivas.json', $dados);

    header('location: DISCindex.php');
}
?>
<main class="caixas">
    <h1>Editar Questão Discursiva (PHP JSON)</h1>
    <nav>
        <a href="DISCindex.php"><button class="botaoBonito pagInicio">Voltar a pag Inicial</button></a>
    </nav>
    <br>
    <form method="POST">
        Índice: <label>
            <input type="text" id="id" name="id">
        </label>
        Pergunta: <label>
            <input type="text" id="pergunta" name="pergunta">
        </label>
        Resposta: <label>
            <input type="text" id="resposta" name="resposta">
        </label>
        <input type="submit" name="salvar" value="Salvar" class="botaoBonito botaoArquivo">
    </form>
</main>
</body>
</html>
