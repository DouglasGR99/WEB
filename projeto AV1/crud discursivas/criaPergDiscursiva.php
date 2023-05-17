<?php
$pergunta = "";
$questaoID = "";
$resposta = "";
$gabarito =  "Resposta Correta";

if ($_SERVER["REQUEST_METHOD"] == "POST") { // se o método de requisição for POST (envio de dados) então faça:
    $pergunta = $_POST["pergunta"];
    $questaoID = $_POST["questaoID"];
    $resposta = $_POST["resposta"];
    $linha1 = "";

    if (!file_exists( "../perguntas.txt")) { // se o arquivo não existir então faça:
        $arcDisc = fopen( "../perguntas.txt",  "a") or die("erro ao criar arquivo");
        $linha1 = "pergunta / resposta; Indice / gabarito\n";
        fwrite($arcDisc, $linha1); // fwrite escreve uma string no arquivo
        fclose($arcDisc);
    }
    $arcDisc = fopen( "../perguntas.txt",  "a") or die("erro ao editar arquivo"); // abre o arquivo para adicionar
    $linha1 = "Pergunta discursiva: " . $pergunta . ";" . $questaoID . "\n"; // cria a linha a ser adicionada
    $linha2 = "Resposta: " . $resposta . ";" . $gabarito . "\n";
    fwrite($arcDisc, $linha1);
    fwrite($arcDisc, $linha2);
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
    <form action="criaPergDiscursiva.php" method="POST">
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