<?php
    $nome = "";
    $cpf = "";
    $matricula = "";
    $DTingresso =  "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") { // se o método de requisição for POST (envio de dados) então faça:
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $matricula = $_POST["matricula"];
        $DTingresso = $_POST["DTingresso"];
        $linha = "";

        if (!file_exists( "alunos.txt")) { // se o arquivo não existir então faça:
            $arcDisc = fopen( "alunos.txt",  "a") or die("erro ao criar arquivo");
            $linha = "nome;cpf;matricula;DTingresso\n";
            fwrite($arcDisc, $linha); // fwrite escreve uma string no arquivo
            fclose($arcDisc);
        }
        $arcDisc = fopen( "alunos.txt",  "a") or die("erro ao editar arquivo"); // abre o arquivo para adicionar
        $linha = $nome . ";" . $cpf . ";" . $matricula . ";" . $DTingresso . "\n"; // cria a linha a ser adicionada
        fwrite($arcDisc, $linha); // escreve a linha no arquivo
        fclose($arcDisc);   // fecha o arquivo
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornulario Aluno php</title>
</head>
<body>
<header class="caixas">
    <h1>Criar Aluno</h1>
    <nav>
        <a href="pagInicial.html"><button class="botaoBonito pagInicio">Voltar a pag Inicial</button></a>
        <a href="reportAluno.php"><button class="botaoBonito pagRead">Listar Alunos</button></a>
        <a href="atualizarAluno.php"><button class="botaoBonito pagUpdate">Atualizar Aluno</button></a>
        <a href="removerAluno.php"><button class="botaoBonito pagDelete">Remover Aluno</button></a>
    </nav>
</header>

<main class="caixas">
    <form action="formularioAluno.php" method="POST">
        Nome: <label>
            <input type="text" name="nome">
        </label>
        CPF: <label>
            <input type="text" name="cpf">
        </label>
        Matricula: <label>
            <input type="text" name="matricula">
        </label>
        Data de ingresso: <label>
            <input type="text" name="DTingresso">
        </label>
        <input class="botaoBonito botaoArquivo" type="submit" value="Criar novo Aluno">
    </form>
</main>
</body>
</html>