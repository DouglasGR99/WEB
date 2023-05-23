<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") { // se o método de requisição for POST (envio de dados) então faça:

    $questaoID = $_SESSION["questaoID"];
    $gabarito =  "Resposta Correta";

    //variaveis para atualizar:
    $pergunta = $_POST["pergunta"];
    $resposta = $_POST["resposta"];


    //variaveis de leitura de linha
    $linhas = file("../perguntas.txt"); // lê todas as linhas do arquivo e armazena em um array
    $indice_atualizar = -1; // variável para armazenar o índice da linha a ser atualizada

    $linha1 = "Pergunta discursiva: " . $pergunta . ";" . $questaoID . "\n";
    $linha2 = "Resposta: " . $resposta . ";" . $gabarito . "\n";

    // Percorre todas as linhas do arquivo com o foreach
    foreach($linhas as $indice => $linha) {
        $dados = explode(";", $linha);
        if($dados[1] == $questaoID) { // Verifica se a linha contém o ID fornecido
            $indice_atualizar = $indice;
            break;
        }
    }

    if($indice_atualizar !== -1) { // Se a linha for encontrada
        $linhas[$indice_atualizar] = $linha1; // Substitui a pergunta antiga pela nova
        $linhas[$indice_atualizar + 1] = $linha2; // Substitui a resposta antiga pela nova

        $arquivo = fopen("../perguntas.txt", "w"); // Abre o arquivo para escrita
        fwrite($arquivo, implode("", $linhas)); // Escreve as linhas restantes no arquivo
        fclose($arquivo);
        echo '<script type="text/javascript">
                alert("Questão modificada com sucesso!");
              </script>';
    } else {
        echo
        '<script type="text/javascript">
                alert("Erro ao modificar questão!");
            </script>';
    }
}
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
    <form action="pergDISCatualizada.php" method="POST">
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