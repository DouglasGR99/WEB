<?php
global $connect;
require_once 'conectaOPT.php';

$stmt = $connect->prepare('SELECT * FROM optativas WHERE id = :id');
$stmt->bindParam(":id", $_GET['edit_id']); // Alterado de $_GET['id'] para $_GET['edit_id']
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_OBJ);

if (isset($_POST['salvar'])) {
    $stmt = $connect->prepare('UPDATE optativas SET enunciado = :enunciado, a = :a, b = :b, c = :c, d = :d, gabarito = :gabarito WHERE id = :id');
    $stmt->bindParam(":id", $_GET['edit_id']); // Alterado de $_GET['id'] para $_GET['edit_id']
    $stmt->bindParam(":enunciado", $_POST['enunciado']);
    $stmt->bindParam(":a", $_POST['a']);
    $stmt->bindParam(":b", $_POST['b']);
    $stmt->bindParam(":c", $_POST['c']);
    $stmt->bindParam(":d", $_POST['d']);
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
                    <td><label for="a"></label><input id="a" type="text" name="a" value="<?php echo $row->a; ?>" required></td>
                </tr>
                <tr>
                    <td>(b)</td>
                    <td><label for="b"></label><input id="b" type="text" name="b" value="<?php echo $row->b; ?>" required></td>
                </tr>
                <tr>
                    <td>(c)</td>
                    <td><label for="c"></label><input id="c" type="text" name="c" value="<?php echo $row->c; ?>" required></td>
                </tr>
                <tr>
                    <td>(d)</td>
                    <td><label for="d"></label><input id="d" type="text" name="d" value="<?php echo $row->d; ?>" required></td>
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
</body>
</html>