<?php
if(isset($_POST['modificar'])) { // Verifica se o botão foi clicado
    $linhas = file("disciplinas.txt"); // Lê todas as linhas do arquivo em um array
    array_splice($linhas, -1); // Remove a última linha do array
    $arquivo = fopen("disciplinas.txt", "w"); // Abre o arquivo em modo de escrita
    fwrite($arquivo, implode("", $linhas)); // Escreve as linhas restantes no arquivo
    fclose($arquivo); // Fecha o arquivo
    echo "Arquivo modificado com sucesso!"; // Mensagem de sucesso
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modificar arquivo lido</title>
</head>
<body>
    <main class="caixas">
        <button class="botaoBonito" onclick="window.history.back()">Voltar</button>
    </main>
