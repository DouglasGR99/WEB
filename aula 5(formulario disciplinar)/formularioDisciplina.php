<?php
    $nome = "";
    $sigla = "";
    $carga = "";
    if ($_SERVER[REQUEST_METHOD] == "POST") {
        $nome = $_POST["nome"];
        $sigla = $_POST["sigla"];
        $carga = $_POST["carga"];
        $linha = "";
        echo "nome " . $nome . " sigla: " . $sigla . " carga: " . $carga;
        if (!file_exists(filename "disciplinas.txt")) {
            $arcDisc = fopen(filename "disciplinas.txt", mode "a") or die("erro ao criar arquivo");
            $linha = "nome;sigla;carga\n";
            fwrite($arcDisc, $linha);
            fclose($arcDisc);
        }
        $arcDisc = fopen(filename "disciplinas.txt", mode "a") or die("erro ao criar arquivo");
        $linha = $nome . ";" $sigla . ";" . $carga . \n;
        fwrite($arcDisc, $linha);
        fclose($arcDisc);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornulario disciplina php</title>
</head>
<body>
    <h1>Formulario Disciplina</h1>
    <form action="formularioDisciplina.php" method="POST">
        Nome: <input type="text" name="nome">
        <br>
        Sigla: <input type="text" name="sigla">
        <br>
        Carga H: <input type="text" name="carga">
        <br>
        <input type="submit" value="Criar nova disciplina">
    </form>
</body>
</html>