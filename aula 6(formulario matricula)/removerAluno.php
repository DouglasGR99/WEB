<?php
if(isset($_POST['modificar'])) {
    $matricula = $_POST['matricula']; // Informação fornecida pelo usuário para identificar a linha a ser removida

    $linhas = file("alunos.txt"); // Lê todas as linhas do arquivo em um array

    $indice_remover = -1;
    foreach($linhas as $indice => $linha) {
        $dados = explode(";", $linha);
        if($dados[2] == $matricula) { // Verifica se a linha contém a matrícula fornecida
            $indice_remover = $indice;
            break;
        }
    }

    if($indice_remover !== -1) { // Se a linha for encontrada
        unset($linhas[$indice_remover]); // Remove a linha do array
        $arquivo = fopen("alunos.txt", "w"); // Abre o arquivo em modo de escrita
        fwrite($arquivo, implode("", $linhas)); // Escreve as linhas restantes no arquivo
        fclose($arquivo); // Fecha o arquivo
        echo "Linha removida com sucesso!"; // Mensagem de sucesso
    } else {
        echo "Linha não encontrada."; // Mensagem de erro
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover linha</title>
</head>
<body>
<header class="caixas">
    <h1>Remover Aluno</h1>
    <nav>
        <a href="pagInicial.html"><button class="botaoBonito pagInicio">Voltar a pag Inicial</button></a>
        <a href="formularioAluno.php"><button class="botaoBonito pagCreate">Criar Aluno</button></a>
        <a href="reportAluno.php"><button class="botaoBonito pagRead">Listar Alunos</button></a>
        <a href="atualizarAluno.php"><button class="botaoBonito pagUpdate">Atualizar Aluno</button></a>
    </nav>
</header>

<main class="caixas">
    <form action="removerAluno.php" method="post">
        <label for="matricula">Informe a matricula do aluno a ser removido:</label>
        <input type="text" id="matricula" name="matricula">
        <br><br>
        <input type="submit" value="Remover linha" name="modificar" class="botaoBonito negativo">
    </form>
</main>
</body>
</html>
