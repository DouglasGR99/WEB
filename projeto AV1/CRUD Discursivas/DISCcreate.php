<?php
$pergunta = "";
$questaoID = "";
$resposta = "";
$gabarito =  "Resposta Correta";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pergunta = $_POST["pergunta"];
    $questaoID = $_POST["questaoID"];
    $resposta = $_POST["resposta"];

    $perguntas = array(); // Array para armazenar as perguntas existentes

    // Verifica se o arquivo JSON já existe
    if (file_exists("../perguntas.json")) {
        $perguntas = json_decode(file_get_contents("../perguntas.json"), true);
    }

    $novaQuestao = array(
        "pergunta" => $pergunta,
        "questaoID" => $questaoID,
        "resposta" => $resposta,
        "gabarito" => $gabarito
    );

    // Adiciona a nova pergunta ao array de perguntas
    $perguntas[] = $novaQuestao;

    // Salva o array de perguntas no arquivo JSON
    file_put_contents("../perguntas.json", json_encode($perguntas));

    // Redireciona para a página de listagem de perguntas
    header("Location: ../pagInicial.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornulario Pergunta Discursiva php</title>
</head>
<body>
<header class="caixas">
    <h1>Criar Pergunta Discursiva</h1>
    <nav>
        <a href="../pagInicial.html"><button class="botaoBonito pagInicio">Voltar a pag Inicial</button></a>
        <a href="../reportPerg.php"><button class="botaoBonito pagRead">Listar Perguntas</button></a>
    </nav>
</header>

<main class="caixas">
    <form action="DISCcreate.php" method="POST">
        Pergunta: <label>
            <input type="text" name="pergunta">
        </label>
        Índice da pergunta: <label>
            <input type="text" name="questaoID">
        </label>
        <br>
        Resposta: <label>
            <input type="text" name="resposta">
        </label>

        <input class="botaoBonito botaoArquivo" type="submit" value="Criar nova Pergunta">
    </form>
</main>
</body>
</html>
