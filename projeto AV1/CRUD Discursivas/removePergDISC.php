<?php
if(isset($_POST['modificar'])) {
    $questaoID = $_POST['questaoID'];
    $perguntas = json_decode(file_get_contents("../perguntas.json"), true); // Lê o conteúdo do arquivo JSON e decodifica em um array associativo

    $indice_remover = -1;
    foreach($perguntas as $indice => $pergunta) {
        if($pergunta['questaoID'] == $questaoID) { // Verifica se a pergunta tem o ID fornecido
            $indice_remover = $indice;
            break;
        }
    }

    if($indice_remover !== -1) { // Se a pergunta for encontrada
        // Remove a pergunta do array
        array_splice($perguntas, $indice_remover, 1);

        // Salva o array atualizado no arquivo JSON
        file_put_contents("../perguntas.json", json_encode($perguntas));

        echo '<script type="text/javascript">
                alert("Pergunta e resposta removidas com sucesso!");
              </script>';
    } else {
        echo
        '<script type="text/javascript">
            let text = "Pergunta não encontrada, criar nova pergunta?";
            if (confirm(text) === true) {
                window.location.href = "criaPergDISC.php";
            } else {
                window.location.href = "removePergDISC.php";
            }
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
    <title>Remover Pergunta Discursiva</title>
</head>
<body>
<header class="caixas">
    <h1>Remover Pergunta Discursiva</h1>
    <nav>
        <a href="../pagInicial.html"><button class="botaoBonito pagInicio">Voltar a pag Inicial</button></a>
        <a href="../reportPerg.php"><button class="botaoBonito pagRead">Listar Perguntas</button></a>
    </nav>
</header>

<main class="caixas">
    <form action="removePergDISC.php" method="post">
        <label for="questaoID">Informe o ID da pergunta a ser removida:</label>
        <input type="text" id="questaoID" name="questaoID">
        <br><br>
        <input type="submit" value="Remover pergunta" name="modificar" class="botaoBonito negativo">
    </form>
</main>
</body>
</html>
