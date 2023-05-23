<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $matricula = $_POST["matricula"];
        $email = $_POST["email"];
		if (!file_exists("alunoNovo.txt")) {
			$cabecalho = "matricula;nome;email;\n";
//			file_put_contents("alunoNovo.txt", $cabecalho);
			$arquivoAluno = fopen("alunoNovo.txt", "w");
			fwrite($arquivoAluno,$cabecalho);
			fclose($arquivoAluno);
		}
//  Vou escrever os dados do formulário em um arquivo de dados
        $arquivoAluno = fopen("alunoNovo.txt", "a");
        
        $txt = $matricula . ";" . $nome . ";" . $email . "\n";
        fwrite($arquivoAluno,$txt);
        fclose($arquivoAluno);
    }
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Inserir Aluno</h1>
<br>
<a href="ex50_incluirAluno.php">Inserir Aluno</a><br>
<a href="ex50_PedeMatAlteraAluno.php">Alterar Aluno</a><br>
<a href="ex50_listarAlunos.php">Listar Alunos</a><br>
<a href="ex50_excluirAluno.php">Excluir Aluno</a><br>
<a href="ex50_detalheAluno.php">Detalhe de Aluno</a><br>
<br>
<form action="ex50_incluirAluno.php" method=POST>
    Matricula: <input type=text name="matricula"> <br>
    nome: <input type=text name="nome"> <br>
    email: <input type=text name="email"> <br>
    <br><br>
    <input type="submit" value="Inserir">
</form>
<br>
</body>
</html>
