<?php
$nome = "";
$cpf = "";
$matricula = "";
$DTingresso =  "";
$linha_nova = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") { // se o método de requisição for POST (envio de dados) então faça:
    //variaveis para atualizar
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $matriculaSelec = $_SESSION["matricula"];
    $DTingresso = $_POST["DTingresso"];

    //variaveis de leitura de linha
    $linhas = file("alunos.txt"); // lê todas as linhas do arquivo e armazena em um array
    $linha_nova = $nome . ";" . $cpf . ";" . $matriculaSelec . ";" . $DTingresso . "\n"; // cria a linha a ser adicionada
    $indice_atualizar = -1; // variável para armazenar o índice da linha a ser atualizada

    // Percorre todas as linhas do arquivo com o foreach
    foreach($linhas as $indice => $linha) {
        $dados = explode(";", $linha);
        if($dados[2] == $matriculaSelec) { // Verifica se a linha contém a matrícula fornecida
            $indice_atualizar = $indice;
            break;
        }
    }

    if($indice_atualizar !== -1) { // Se a linha for encontrada
        $linhas[$indice_atualizar] = $linha_nova; // Substitui a linha antiga pela nova
        $arquivo = fopen("alunos.txt", "w"); // Abre o arquivo para escrita
        fwrite($arquivo, implode("", $linhas)); // Escreve as linhas restantes no arquivo
        fclose($arquivo);
        echo '<script type="text/javascript">
                alert("Aluno modificado com sucesso!");
              </script>';
    } else {
        echo
        '<script type="text/javascript">
                alert("Erro ao modificar Aluno!");
            </script>';
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
        <a href="atualizarAluno.php"><button class="botaoBonito pagUpdate">Voltar a busca</button></a>
    </nav>
</header>

<main class="caixas">
    <form action="alunoAtualizado.php" method="POST">
        Nome: <label>
            <input type="text" name="nome">
        </label>
        CPF: <label>
            <input type="text" name="cpf">
        </label>
        Data de ingresso: <label>
            <input type="text" name="DTingresso">
        </label>
        <input type="submit" name="modificar" value="Modificar Aluno" class="botaoBonito pagUpdate">
    </form>
</main>
</body>
</html>
