<?php
session_start();
if(isset($_POST['buscarPERG'])) {
    $pergunta = $_POST['matricula']; // Informação fornecida pelo usuário para identificar a linha a ser removida

    $linhas = file("perguntas.txt");

    $indice_buscar = -1;
    foreach($linhas as $indice => $linha) {
        $dados = explode(";", $linha);
        if($dados[0] == $pergunta) { // Verifica se a linha contém a Pergunta fornecida
            $indice_buscar = $indice; // Guarda o índice da Pergunta a ser atualizada
            break;
        }
    }
    $perguntaSelec = $pergunta;
    $_SESSION["pergunta"] = $perguntaSelec;

    if($indice_buscar !== -1) { // Se a linha for encontrada
        echo '<script type="text/javascript">
            let text = "Pergunta encontrada! atualizar Pergunta?";
            if (confirm(text) === true) { 
                window.location.href = "pergMultAtualizada.php"; 
            } else { 
                window.location.href = "atualizaPergMultipla.php"; 
            } </script>';
    } else {
        echo '<script type="text/javascript">
            let text = "Pergunta não encontrada, criar nova Pergunta?";
            if (confirm(text) === true) {
                window.location.href = "criaPergMultipla.php";
            } else {
                window.location.href = "atualizaPergMultipla.php"; } </script>';
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
    <title>Atualizar Pergunta Optativa php</title>
</head>
<body>
<header class="caixas">
    <h1>Atualizar Pergunta Optativa</h1>
    <nav>
        <a href="../pagInicial.html"><button class="botaoBonito pagInicio">Voltar a pag Inicial</button></a>
        <a href="../reportPerg.php"><button class="botaoBonito pagRead">Listar Perguntas</button></a>
    </nav>
</header>

<main class="caixas">
    <form action="atualizaPergMultipla.php" method="post">
        <label for="pergunta">Informe a pergunta a ser atualizada:</label>
        <input type="text" id="pergunta" name="pergunta">
        <br><br>
        <input type="submit" value="Buscar" name="buscarPERG" class="botaoBonito pagUpdate">
    </form>
</main>
</body>
</html>