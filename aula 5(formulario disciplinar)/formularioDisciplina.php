<?php
    $nome = "";
    $sigla = "";
    $carga = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") { // se o método de requisição for POST (envio de dados) então faça:
        $nome = $_POST["nome"];
        $sigla = $_POST["sigla"];
        $carga = $_POST["carga"];
        $linha = "";
        // echo "nome " . $nome . " sigla: " . $sigla . " carga: " . $carga;
        if (!file_exists( "disciplinas.txt")) { // se o arquivo não existir então faça:
            $arcDisc = fopen( "disciplinas.txt",  "a") or die("erro ao criar arquivo");
            $linha = "nome;sigla;carga\n";
            fwrite($arcDisc, $linha); // fwrite escreve uma string no arquivo
            fclose($arcDisc);
        }
        $arcDisc = fopen( "disciplinas.txt",  "a") or die("erro ao criar arquivo"); // abre o arquivo para adicionar
        $linha = $nome . ";" . $sigla . ";" . $carga . "\n"; // cria a linha a ser adicionada
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
    <title>Fornulario disciplina php</title>
</head>
<body>
    <main class="caixas">
        <h1>Formulario Disciplinar </h1>
        <form action="formularioDisciplina.php" method="POST">
            Nome: <label>
                <input type="text" name="nome">
            </label>
            Sigla: <label>
                <input type="text" name="sigla">
            </label>
            Carga H: <label>
                <input type="text" name="carga">
            </label>
        </form>
        <input class="botaoBonito botaoArquivo" type="submit" value="Criar nova disciplina">
        <a href="reportDisciplina.php"><button class="botaoBonito botaoPagina">Listar Disciplinas</button></a>
    </main>
</body>
</html>