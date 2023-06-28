<?php
    global $connect;
    require_once 'conectaOPT.php';

$stmt = $connect->prepare('SELECT * FROM optativas WHERE id = :id');
$stmt->bindParam(":id", $_GET['edit_id']); // Alterado de $_GET['id'] para $_GET['edit_id']
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_OBJ);

if (isset($_POST['salvar'])) {
    $stmt = $connect->prepare('UPDATE optativas SET enunciado = :enunciado, a = :opca, b = :opcb, c = :opcc, d = :opcd, gabarito = :gabarito WHERE id = :id');
    $stmt->bindParam(":id", $_GET['edit_id']); // Alterado de $_GET['id'] para $_GET['edit_id']
    $stmt->bindParam(":enunciado", $_POST['enunciado']);
    $stmt->bindParam(":opca", $_POST['opca']);
    $stmt->bindParam(":opcb", $_POST['opcb']);
    $stmt->bindParam(":opcc", $_POST['opcc']);
    $stmt->bindParam(":opcd", $_POST['opcd']);
    $stmt->bindParam(":gabarito", $_POST['gabarito']);
    $stmt->execute();
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Edita Pergunta Optativa php</title>

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
            <legend>CRUD optativas</legend>
            <table>
                <tr>
                    <td>Enunciado:</td>
                    <td><label for="enunciado"></label><input id="enunciado" type="text" name="enunciado" value="<?php echo $row->enunciado; ?>" required></td>
                </tr>
                <tr>
                    <td>(a)</td>
                    <td><label for="a"></label><input id="opca" type="text" name="opca" value="<?php echo $row->a; ?>" required></td>
                </tr>
                <tr>
                    <td>(b)</td>
                    <td><label for="b"></label><input id="opcb" type="text" name="opcb" value="<?php echo $row->b; ?>" required></td>
                </tr>
                <tr>
                    <td>(c)</td>
                    <td><label for="c"></label><input id="opcc" type="text" name="opcc" value="<?php echo $row->c; ?>" required></td>
                </tr>
                <tr>
                    <td>(d)</td>
                    <td><label for="d"></label><input id="opcd" type="text" name="opcd" value="<?php echo $row->d; ?>" required></td>
                </tr>
                <tr>
                    <td>Gabarito:</td>
                    <td><label for="gabarito"></label><input id="gabarito" type="text" name="gabarito" value="<?php echo $row->gabarito; ?>" required></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input class="btn btn-sucess" type="submit" name="salvar" value="Atualizar"></td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>