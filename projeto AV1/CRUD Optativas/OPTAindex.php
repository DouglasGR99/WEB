<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") { // se o método de requisição for POST (envio de dados) então faça:

    $questaoID = $_SESSION["questaoID"];
    //variaveis para atualizar:
    $pergunta = $_POST["pergunta"];

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

    //variaveis de leitura de linha
    $linhas = file("../perguntas.txt"); // lê todas as linhas do arquivo e armazena em um array
    $indice_atualizar = -1; // variável para armazenar o índice da linha a ser atualizada

    $linha_nova = "Pergunta optativa: " . $pergunta . ";" . $questaoID . "\n";
    $opcoes = array();
    for($i = 0; $i < 5; $i++) {
        $opcoes[$i] = "(" . chr(97 + $i) . ") " . $respostas[$i] . ";" . $gabaritos[$i] . "\n";
    }

    // Percorre todas as linhas do arquivo com o foreach
    foreach($linhas as $indice => $linha) {
        $dados = explode(";", $linha);
        if($dados[1] == $questaoID) { // Verifica se a linha contém o ID fornecido
            $indice_atualizar = $indice;
            break;
        }
    }

    if($indice_atualizar !== -1) { // Se a linha for encontrada
        $linhas[$indice_atualizar] = $linha_nova; // Substitui a linha antiga pela nova
        for($i = 0; $i < 5; $i++) { // Substitui as opções
            $linhas[$indice_atualizar + $i + 1] = $opcoes[$i];
        }
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
    <title>Pergunta Optativa Atualizada</title>
</head>
<body>
<header class="caixas">
    <h1>Pergunta Optativa Atualizada</h1>
    <nav>
        <a href="../pagInicial.html"><button class="botaoBonito pagInicio">Voltar a pag Inicial</button></a>
        <a href="../reportPerg.php"><button class="botaoBonito pagRead">Listar Perguntas</button></a>
    </nav>
</header>

<main class="caixas">
    <form action="OPTAindex.php" method="POST">
        Nova Pergunta: <label>
            <input type="text" name="pergunta">
        </label>
        <br>
        Opção 1(atualizada): <label>
            <input type="text" name="resposta1">
        </label>
        Gabarito atualizado (opc 1) (sim/não): <label>
            <input type="text" name="gabarito1">
        </label>

        Opção 2(atualizada): <label>
            <input type="text" name="resposta2">
        </label>
        Gabarito atualizado (opc 2) (sim/não): <label>
            <input type="text" name="gabarito2">
        </label>

        Opção 3(atualizada): <label>
            <input type="text" name="resposta3">
        </label>
        Gabarito atualizado (opc 3) (sim/não): <label>
            <input type="text" name="gabarito3">
        </label>

        Opção 4(atualizada): <label>
            <input type="text" name="resposta4">
        </label>
        Gabarito atualizado (opc 4) (sim/não): <label>
            <input type="text" name="gabarito4">
        </label>

        Opção 5(atualizada): <label>
            <input type="text" name="resposta5">
        </label>
        Gabarito atualizado (opc 5) (sim/não): <label>
            <input type="text" name="gabarito5">
        </label>
        <input type="submit" name="modificar" value="Modificar questão" class="botaoBonito pagUpdate">
    </form>
</main>
</body>
</html>