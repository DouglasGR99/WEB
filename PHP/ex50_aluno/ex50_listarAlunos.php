<?php
$matricula = "";
$nome = "";
$email = "";
$arquivoAlunoIn = fopen("alunoNovo2.txt", "r");
$x = 0;
$linhas = fgets($arquivoAlunoIn);


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
<a href="ex50_PedeMatExcluirAluno.php">Excluir Aluno</a><br>
<a href="ex50_PedeMatDetalheAluno.php">Detalhe de Aluno</a><br>
<br><br><br>
<table style="width: 100%; border: 1px solid">
    <tr>
        <th>Matricula</th>
        <th>Nome</th>
        <th>email</th>
        <th>Ações</th>
    </tr>
    <?php
while (!feof($arquivoAlunoIn)) {
    $linhas = fgets($arquivoAlunoIn);
    $colunaDados = explode(";", $linhas);
//    var_dump($colunaDados[0]);
//    echo $linhas;
//    echo $colunaDados[0];
        $matricula = $colunaDados[0];
        $nome = $colunaDados[1];
        $email = $colunaDados[2];
    $x++;
    // echo "<tr><td>$matricula</td><td>$nome</td><td>$email</td><td></td></tr>";
?>
    <tr>
        <td><?php echo $matricula ?></td>
        <td><?php echo $nome ?></td>
        <td><?php echo $email ?></td>
        <td><a href="ex50_AlterarAluno.php?matricula=<?php echo $matricula ?>" >Alterar</a>
        <form action="ex50_excluirAluno.php" method="Get">
            <input type="hidden" name="matricula" value=<?php echo "'" . $matricula . "'" ?>>
            <input type="submit" value="Excluir">
        </form>
        </td>

    </tr>
<?php
}
fclose($arquivoAlunoIn);
 ?>

</table>

<br>
</body>
</html>
