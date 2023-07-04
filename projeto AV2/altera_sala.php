<?php
global $connect;
require_once 'conectaDB.php';

$stmt = $connect->prepare('SELECT * FROM candidatos WHERE CPF = :CPF');
$stmt->bindParam(":CPF", $_GET['edit_id']); // Alterado de $_GET['id'] para $_GET['edit_id']
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_OBJ);

if (isset($_POST['salvar'])) {
    $stmt = $connect->prepare('UPDATE candidatos SET cod_sala = :cod_sala WHERE CPF = :CPF');
    $stmt->bindParam(":CPF", $_GET['edit_id']); // Alterado de $_GET['CPF'] para $_GET['edit_id']
    $stmt->bindParam(":cod_sala", $_POST['cod_sala']);
    $stmt->execute();
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Troca candidato de sala</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<!-- Formulário para editar dados -->
<div>
    <form method="post" autocomplete="off">
        <fieldset>
            <legend>Altera sala de candidato</legend>
            <table>
                <tr>
                    <td>Nova sala:</td>
                    <td><label for="cod_sala"></label><input id="cod_sala" type="text" name="cod_sala" value="<?php echo $row->cod_sala; ?>" required></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input class="btn btn-sucess" type="submit" name="salvar" value="Atualizar"></td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>