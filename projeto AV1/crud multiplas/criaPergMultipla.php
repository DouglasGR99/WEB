<?php
$pergunta = "";
$questaoID = "";
$dados = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pergunta = $_POST["pergunta"];
    $questaoID = $_POST["questaoID"];

    $respostas = array(
        $_POST["resposta1"],
        $_POST["resposta2"],
        $_POST["resposta3"],
        $_POST["resposta4"],
        $_POST["resposta5"]
    );

    $gabaritos = array(
        $_POST["gabarito1"],
        $_POST["gabarito2"],
        $_POST["gabarito3"],
        $_POST["gabarito4"],
        $_POST["gabarito5"]
    );

    if (!file_exists("../perguntas.txt")) {
        $arcDisc = fopen("../perguntas.txt", "a") or die("erro ao criar arquivo");
        $linha1 = "pergunta / resposta; Indice / gabarito\n";
        fwrite($arcDisc, $linha1);
        fclose($arcDisc);
    }

    $arcDisc = fopen("../perguntas.txt", "a") or die("erro ao editar arquivo");

    $linha1 = "Pergunta optativa: " . $pergunta . ";" . $questaoID . "\n";
    fwrite($arcDisc, $linha1);

    for ($i = 0; $i < count($respostas); $i++) {
        $linha = "(" . chr(97 + $i) . ") " . $respostas[$i] . ";" . $gabaritos[$i] . "\n";
        fwrite($arcDisc, $linha);
    }

    fclose($arcDisc);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornulario Pergunta Optativa php</title>
</head>
<body>
<header class="caixas">
    <h1>Criar Pergunta Optativa</h1>
    <nav>
        <a href="../pagInicial.html"><button class="botaoBonito pagInicio">Voltar a pag Inicial</button></a>
        <a href="../reportPerg.php"><button class="botaoBonito pagRead">Listar Perguntas</button></a>
    </nav>
</header>

<main class="caixas">
    <form action="criaPergMultipla.php" method="POST">
        Pergunta: <label>
            <input type="text" name="pergunta">
        </label>
        Índice da pergunta: <label>
            <input type="text" name="questaoID">
        </label>
        <br>
        Resposta 1: <label>
            <input type="text" name="resposta1">
        </label>
        A resposta anterior está correta? (gabarito) (sim/não): <label>
            <input type="text" name="gabarito1">
        </label>

        Resposta 2: <label>
            <input type="text" name="resposta2">
        </label>
        A resposta anterior está correta? (gabarito) (sim/não): <label>
            <input type="text" name="gabarito2">
        </label>

        Resposta 3: <label>
            <input type="text" name="resposta3">
        </label>
        A resposta anterior está correta? (gabarito) (sim/não): <label>
            <input type="text" name="gabarito3">
        </label>

        Resposta 4: <label>
            <input type="text" name="resposta4">
        </label>
        A resposta anterior está correta? (gabarito) (sim/não): <label>
            <input type="text" name="gabarito4">
        </label>

        Resposta 5: <label>
            <input type="text" name="resposta5">
        </label>
        A resposta anterior está correta? (gabarito) (sim/não): <label>
            <input type="text" name="gabarito5">
        </label>

        <input class="botaoBonito botaoArquivo" type="submit" value="Criar nova Pergunta">
    </form>
</main>
</body>
</html>