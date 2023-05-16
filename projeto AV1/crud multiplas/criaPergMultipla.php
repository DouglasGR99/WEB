<?php
    $pergunta = "";
    $gabNULL = "";
    $resposta1 = "";
    $gabarito1 =  "";
    $resposta2 = "";
    $gabarito2 =  "";
    $resposta3 = "";
    $gabarito3 =  "";
    $resposta4 = "";
    $gabarito4 =  "";
    $resposta5 = "";
    $gabarito5 =  "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") { // se o método de requisição for POST (envio de dados) então faça:
        $pergunta = $_POST["pergunta"];
        $resposta1 = $_POST["resposta1"];
        $gabarito1 = $_POST["gabarito1"];
        $resposta2 = $_POST["resposta2"];
        $gabarito2 = $_POST["gabarito2"];
        $resposta3 = $_POST["resposta3"];
        $gabarito3 = $_POST["gabarito3"];
        $resposta4 = $_POST["resposta4"];
        $gabarito4 = $_POST["gabarito4"];
        $resposta5 = $_POST["resposta5"];
        $gabarito5 = $_POST["gabarito5"];
        $linha1 = "";

        if (!file_exists( "perguntas.txt")) { // se o arquivo não existir então faça:
            $arcDisc = fopen( "perguntas.txt",  "a") or die("erro ao criar arquivo");
            $linha1 = "pergunta;gabNULL\n";
            fwrite($arcDisc, $linha1); // fwrite escreve uma string no arquivo
            fclose($arcDisc);
        }
        $arcDisc = fopen( "perguntas.txt",  "a") or die("erro ao editar arquivo"); // abre o arquivo para adicionar
        $linha1 = $pergunta . ";" . $gabNULL . "\n"; // cria a linha a ser adicionada
        $linha2 = $resposta1 . ";" . $gabarito1 . "\n";
        $linha3 = $resposta2 . ";" . $gabarito2 . "\n";
        $linha4 = $resposta3 . ";" . $gabarito3 . "\n";
        $linha5 = $resposta4 . ";" . $gabarito4 . "\n";
        $linha6 = $resposta5 . ";" . $gabarito5 . "\n";
        fwrite($arcDisc, $linha1);
        fwrite($arcDisc, $linha2);
        fwrite($arcDisc, $linha3);
        fwrite($arcDisc, $linha4);
        fwrite($arcDisc, $linha5);
        fwrite($arcDisc, $linha6);
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
    <title>Fornulario Pergunta php</title>
</head>
<body>
<header class="caixas">
    <h1>Criar Pergunta</h1>
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