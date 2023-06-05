<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Questão Discursiva (PHP JSON)</title>
</head>
<body>
<main class="caixas">
    <h1>Editar Questão Discursiva (PHP JSON)</h1>
    <nav>
        <a href="DISCindex.php"><button class="botaoBonito pagInicio">Voltar a pag Inicial</button></a>
    </nav>
    <br>
    <form action="DISCupdate.php" method="post">
        <label for="questaoID">Informe o ID da pergunta discursiva a ser atualizada:</label>
        <input type="text" id="questaoID" name="questaoID">
        <br><br>
        <input type="submit" value="Buscar" name="buscarPERG" class="botaoBonito pagUpdate">
    </form>
</main>
</body>
</html>
