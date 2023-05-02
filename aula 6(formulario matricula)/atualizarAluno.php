<?php

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Aluno php</title>
</head>
<body>
<header class="caixas">
    <h1>Atualizar Aluno</h1>
    <nav>
        <a href="pagInicial.html"><button class="botaoBonito pagInicio">Voltar a pag Inicial</button></a>
        <a href="formularioAluno.php"><button class="botaoBonito pagCreate">Criar Aluno</button></a>
        <a href="reportAluno.php"><button class="botaoBonito pagRead">Listar Alunos</button></a>
        <a href="removerAluno.php"><button class="botaoBonito pagDelete">Remover Aluno</button></a>
    </nav>
</header>

<main class="caixas">
    <form action="atualizarAluno.php" method="post">
        <label for="matricula">Informe a matricula do aluno a ser atualizado:</label>
        <input type="text" id="matricula" name="matricula">
        <br><br>
        <input type="submit" value="Buscar" name="modificar" class="botaoBonito negativo">
    </form>
</main>
</body>
</html>