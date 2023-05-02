<?php
if(isset($_POST['buscarAL'])) {
    $matricula = $_POST['matricula']; // Informação fornecida pelo usuário para identificar a linha a ser removida

    $linhas = file("alunos.txt");

    $indice_buscar = -1;
    foreach($linhas as $indice => $linha) {
        $dados = explode(";", $linha);
        if($dados[2] == $matricula) { // Verifica se a linha contém a matrícula fornecida
            $indice_buscar = $indice; // Guarda o índice da linha a ser atualizada
            break;
        }
    }

    if($indice_buscar !== -1) { // Se a linha for encontrada
        echo
        '<script type="text/javascript">
            let text = "Aluno encontrado! atualizar Aluno?";
            if (confirm(text) === true) {
                window.location.href = "alunoAtualizado.php";
                $_SESSION["matricula"] = $matriculaSelec;
            } else {
                window.location.href = "atualizarAluno.php";
            }
            </script>';
    } else {
        echo
        '<script type="text/javascript">
            let text = "Aluno não encontrado, criar novo Aluno?";
            if (confirm(text) === true) {
                window.location.href = "formularioAluno.php";
            } else {
                window.location.href = "atualizarAluno.php";
            }
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
        <input type="submit" value="Buscar" name="buscarAL" class="botaoBonito pagUpdate">
    </form>
</main>
</body>
</html>