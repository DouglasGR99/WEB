<?php
session_start();
if(isset($_POST['buscarPERG'])) {
    $pergunta = $_POST['questaoID']; // Informação fornecida pelo usuário para identificar a pergunta a ser buscada

    $perguntas = json_decode(file_get_contents("../perguntas.json"), true); // Lê o conteúdo do arquivo JSON e decodifica em um array associativo

    $perguntaEncontrada = null;
    foreach($perguntas as $indice => $perguntaArray) {
        if($perguntaArray['questaoID'] == $pergunta) { // Verifica se a pergunta tem o ID fornecido
            $perguntaEncontrada = $perguntaArray;
            break;
        }
    }

    if($perguntaEncontrada !== null) { // Se a pergunta for encontrada
        $_SESSION["questaoID"] = $perguntaEncontrada;

        echo '<script type="text/javascript">
            let text = "Pergunta encontrada! Atualizar pergunta?";
            if (confirm(text) === true) { 
                window.location.href = "pergDISCatualizada.php"; 
            } else { 
                window.location.href = "atualizaPergDISC.php"; 
            } </script>';
    } else {
        echo '<script type="text/javascript">
            let text = "Pergunta não encontrada, criar nova pergunta?";
            if (confirm(text) === true) {
                window.location.href = "criaPergDISC.php";
            } else {
                window.location.href = "atualizaPergDISC.php";
            } </script>';
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
    <title>Atualizar Pergunta Discursiva</title>
</head>
<body>
<header class="caixas">
    <h1>Atualizar Pergunta Discursiva</h1>
    <nav>
        <a href="../pagInicial.html"><button class="botaoBonito pagInicio">Voltar a pag Inicial</button></a>
        <a href="../reportPerg.php"><button class="botaoBonito pagRead">Listar Perguntas</button></a>
    </nav>
</header>

<main class="caixas">
    <form action="atualizaPergDISC.php" method="post">
        <label for="questaoID">Informe o ID da pergunta discursiva a ser atualizada:</label>
        <input type="text" id="questaoID" name="questaoID">
        <br><br>
        <input type="submit" value="Buscar" name="buscarPERG" class="botaoBonito pagUpdate">
    </form>
</main>
</body>
</html>
