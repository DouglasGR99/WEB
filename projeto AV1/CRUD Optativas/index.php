<?php
    global $connect;
    require 'conectaOPT.php';

    //create
    if (isset($_POST['salvar'])) {
        $enunciado = $_POST['enunciado'];
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];
        $d = $_POST['d'];
        $gabarito = $_POST['gabarito'];

        $sql = "INSERT INTO optativas (enunciado, a, b, c, d, gabarito) VALUES ('$enunciado', '$a', '$b', '$c', '$d', '$gabarito')";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        header("Location: index.php");
    }

    //delete
    if (isset($_GET['delete_id'])) {
        $stmt = $connect->prepare("DELETE FROM optativas WHERE id = :id");
        $stmt->bindParam(":id", $_GET['delete_id']);
        $stmt->execute();
        header("Location: index.php");
    }

    $stmt = $connect->prepare("SELECT * FROM optativas");
    $stmt->execute();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>CRUD Pergunta Optativa php</title>

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container">
    <div class="header">
        <!-- Cabeçalho -->
        <h1>CRUD Perguntas Optativas</h1>
        <a href="../CRUD%20Discursivas/index.php" class="btn">Perguntas Discursivas</a>
    </div>
    <div class="content">
        <div class="form-section">
            <!-- Formulário para inserir dados -->
            <form method="post" autocomplete="off">
                <fieldset>
                    <legend>Criar pergunta</legend>
                    <table class="tabela">
                        <tr>
                            <td>Enunciado:</td>
                            <td><input id="enunciado" type="text" name="enunciado" required></td>
                        </tr>
                        <tr>
                            <td>(a)</td>
                            <td><label for="a"></label><input id="a" type="text" name="a" required></td>
                        </tr>
                        <tr>
                            <td>(b)</td>
                            <td><label for="b"></label><input id="b" type="text" name="b" required></td>
                        </tr>
                        <tr>
                            <td>(c)</td>
                            <td><label for="c"></label><input id="c" type="text" name="c" required></td>
                        </tr>
                        <tr>
                            <td>(d)</td>
                            <td><label for="d"></label><input id="d" type="text" name="d" required></td>
                        </tr>
                        <tr>
                            <td>Resposta correta:</td>
                            <td><label for="gabarito"></label><input id="gabarito" type="text" name="gabarito" required></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input class="btn btn-sucess" type="submit" name="salvar" value="Salvar"></td>
                        </tr>
                    </table>
                </fieldset>
            </form>
        </div>
        <div class="table-section">
            <!-- Mostrando os dados do banco de dados -->
            <table class="tabela">
                <tr>
                    <th>ID</th>
                    <th>Enunciado</th>
                    <th>(a)</th>
                    <th>(b)</th>
                    <th>(c)</th>
                    <th>(d)</th>
                    <th>Resposta correta</th>
                    <th>Ação</th>
                </tr>
                <?php while ($row = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
                    <tr>
                        <td><?php echo $row->id; ?></td>
                        <td><?php echo $row->enunciado; ?></td>
                        <td><?php echo $row->a; ?></td>
                        <td><?php echo $row->b; ?></td>
                        <td><?php echo $row->c; ?></td>
                        <td><?php echo $row->d; ?></td>
                        <td><?php echo '(' . $row->gabarito . ')'; ?></td>
                        <td>
                            <a onclick="return confirm('Tem certeza que deseja editar?')" class="btn btn-warning" href="editaOPT.php?edit_id=<?php echo $row->id; ?>">Editar</a>
                            <br>
                            <a onclick="return confirm('Tem certeza que deseja deletar?')" class="btn btn-danger" href="?delete_id=<?php echo $row->id; ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>