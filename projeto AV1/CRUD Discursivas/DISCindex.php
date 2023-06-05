<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") { // se o método de requisição for POST (envio de dados) então faça:

    $questaoID = $_SESSION["questaoID"];
    $gabarito =  "Resposta Correta";

    // variáveis para atualizar:
    $pergunta = $_POST["pergunta"];
    $resposta = $_POST["resposta"];

    // Carrega o conteúdo do arquivo JSON em uma string
    $jsonString = file_get_contents('../perguntas.json');

    // Converte a string JSON em um array associativo
    $dados = json_decode($jsonString, true);

    // lê o conteúdo do arquivo JSON e decodifica em um array associativo
    $perguntas = json_decode(file_get_contents("../perguntas.json"), true);

    /*$indice_atualizar = -1; // variável para armazenar o índice da pergunta a ser atualizada

    // Percorre todas as perguntas no array
    foreach($perguntas as $indice => $perguntaArray) {
        if($perguntaArray['questaoID'] == $questaoID) { // Verifica se a pergunta tem o ID fornecido
            $indice_atualizar = $indice;
            break;
        }
    }*/
    // Percorre o array para encontrar a pergunta com o ID correspondente
    foreach ($dados as &$pergunta) {
        if ($pergunta['questaoID'] == $questaoID) {
            // Modifica os atributos desejados
            $pergunta['pergunta'] = "4321"; // Atualiza a pergunta
            $pergunta['resposta'] = "1234"; // Atualiza a resposta

            break; // Interrompe o loop assim que encontrar a pergunta
        }
    }

    /*if($indice_atualizar !== -1) { // Se a pergunta for encontrada
        $perguntas[$indice_atualizar]['pergunta'] = $pergunta; // Atualiza a pergunta
        $perguntas[$indice_atualizar]['resposta'] = $resposta; // Atualiza a resposta*/

        // Converte o array associativo em formato JSON e escreve no arquivo
        /*file_put_contents("../perguntas.json", json_encode($perguntas));*/

    // Converte o array de volta para uma string JSON
    $newJsonString = json_encode($dados, JSON_PRETTY_PRINT);

    // Escreve o conteúdo atualizado de volta para o arquivo JSON
    file_put_contents('../perguntas.json', $newJsonString);

        echo '<script type="text/javascript">
                alert("Questão modificada com sucesso!");
              </script>';
} /*else {
    echo '<script type="text/javascript">
            alert("Erro ao modificar questão!");
          </script>';
}*/
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pergunta Discursiva Atualizada</title>
</head>
<body>
<header class="caixas">
    <h1>Pergunta Discursiva Atualizada</h1>
    <nav>
        <a href="../pagInicial.html"><button class="botaoBonito pagInicio">Voltar a pag Inicial</button></a>
        <a href="../reportPerg.php"><button class="botaoBonito pagRead">Listar Perguntas</button></a>
    </nav>
</header>

<main class="caixas">
    <form action="DISCindex.php" method="POST">
        Nova Pergunta: <label>
            <input type="text" name="pergunta">
        </label>
        <br>
        Nova Resposta: <label>
            <input type="text" name="resposta">
        </label>
        <input type="submit" name="modificar" value="Modificar questão" class="botaoBonito pagUpdate">
    </form>
</main>
</body>
</html>