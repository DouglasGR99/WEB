<?php
$matricula = "";
$nome = "";
$email = "";

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $matricula = $_GET["matricula"];
//  Vou escrever os dados do formulário em um arquivo de dados
        $arquivoAlunoIn = fopen("alunoNovo.txt", "r");
        $x = 0;
		$linhas[] = fgets($arquivoAlunoIn);
		while (!feof($arquivoAlunoIn)) {
			$linhas[] = fgets($arquivoAlunoIn);
			$colunaDados = explode(";", $linhas[$x]);
			if ($colunaDados[0] == $matricula) {
				$nome = $colunaDados[1];
				$email = $colunaDados[2];
				break;
			}
			$x++;
		}
        fclose($arquivoAlunoIn);
    } else {
		$nome = $_POST["nome"];
        $matricula = $_POST["matricula"];
        $email = $_POST["email"];
		
		$arquivoAlunoIn = fopen("alunoNovo.txt", "r");
		while (!feof($arquivoAlunoIn)) {
			$linhas[] = fgets($arquivoAlunoIn);
		}
        fclose($arquivoAlunoIn);
		
		$arquivoAlunoOut = fopen("alunoNovo.txt", "w");
		$txt = "";
		foreach ($linhas as $linha) {
			$colunaDados = explode(";", $linha);
			if ($colunaDados[0] == $matricula) {
				$txt = "$matricula;$nome;$email\n";
			} else {
				$txt = $linha;
			}
			fwrite($arquivoAlunoOut, $txt);
		}
		fclose($arquivoAlunoOut);

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
<form action="ex50_AlterarAluno.php" method="POST">
    Matricula: <input type=text name="matricula" disabled value=<?php echo "'" . $matricula . "'" ?>> <br>
    nome: <input type=text name="nome" value=<?php echo "'" . $nome . "'" ?>> <br>
    email: <input type=text name="email" value=<?php echo "'" . $email . "'" ?>> <br>
    <br><br>
    <input type="submit" value="Alterar">
</form>
<br>
</body>
</html>
