<?php
global $connect;
require_once 'conectaDIS.php';

$stmt = $connect->prepare('SELECT * FROM discursivas WHERE id = :id');
$stmt->bindParam(":id", $_GET['edit_id']); // Alterado de $_GET['id'] para $_GET['edit_id']
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_OBJ);

if (isset($_POST['salvar'])) {
    $stmt = $connect->prepare('UPDATE discursivas SET enunciado = :enunciado,resposta = :resposta WHERE id = :id');
    $stmt->bindParam(":id", $_GET['edit_id']); // Alterado de $_GET['id'] para $_GET['edit_id']
    $stmt->bindParam(":enunciado", $_POST['enunciado']);
    $stmt->bindParam(":resposta", $_POST['resposta']);
    $stmt->execute();
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Edita Pergunta Discursiva php</title>

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<!-- Formulário para editar dados -->
<div>
    <form method="post" autocomplete="off">
        <fieldset>
            <legend>CRUD discursivas</legend>
            <table>
                <tr>
                    <td>Enunciado:</td>
                    <td><label for="enunciado"></label><input id="enunciado" type="text" name="enunciado" value="<?php echo $row->enunciado; ?>" required></td>
                </tr>
                <tr>
                    <td>Resposta:</td>
                    <td><label for="resposta"></label><input id="resposta" type="text" name="resposta" value="<?php echo $row->resposta; ?>" required></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input class="btn btn-sucess" type="submit" name="salvar" value="Atualizar"></td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>