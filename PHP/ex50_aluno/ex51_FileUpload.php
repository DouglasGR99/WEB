<?php
    if ($_SERVER["REQUEST_METHOD"] != "GET") {
        $dirCarga = "arquivosCarga/";
        $fileCarga = $dirCarga . basename($_FILES["fileToUpload"]["name"]);
    //echo $fileCarga;
        $txtFileType = strtolower(pathinfo($fileCarga, PATHINFO_EXTENSION));
    //echo $txtFileType;

        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $fileCarga)) {

            if (!file_exists($fileCarga)) {
                echo "xiiiiiiiiiiii. \n";
            } else {
                echo "Arquivo carregado com sucesso\n";
            }
        }
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
<a href="ex51_FileUpload.php">Upload de Arquivo</a><br>
<br>
<form action="ex51_FileUpload.php" method="POST" enctype="multipart/form-data">
    Selecione o arquivo para upload:<br><br>
    <input type="file" name="fileToUpload" id="fileToUpload">  <br><br>
    <input type="submit" name="submit" value="Upload File">
</form>
<br>
</body>
</html>
