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
            <form method="post" autocomplete="off" id="formOptativas">
                    <legend>Criar pergunta</legend>
                    <table class="tabela">
                        <tr>
                            <td>Enunciado:</td>
                            <td><input id="enunciado" type="text" name="enunciado" required></td>
                        </tr>
                        <tr>
                            <td>(a)</td>
                            <td><label for="a"></label><input id="opca" type="text" name="opca" required></td>
                        </tr>
                        <tr>
                            <td>(b)</td>
                            <td><label for="b"></label><input id="opcb" type="text" name="opcb" required></td>
                        </tr>
                        <tr>
                            <td>(c)</td>
                            <td><label for="c"></label><input id="opcc" type="text" name="opcc" required></td>
                        </tr>
                        <tr>
                            <td>(d)</td>
                            <td><label for="d"></label><input id="opcd" type="text" name="opcd" required></td>
                        </tr>
                        <tr>
                            <td>Resposta correta:</td>
                            <td><label for="gabarito"></label><input id="gabarito" type="text" name="gabarito" required></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input class="btn btn-sucess" type="submit" name="salvar" value="Salvar" onclick="enviarDados()"></td>
                        </tr>
                    </table>
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
                <?php
                global $connect;
                require 'conectaOPT.php';
                $stmt = $connect->prepare("SELECT * FROM optativas");
                while ($row = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
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
                            <a onclick="excluirRegistro(<?php echo $row->id; ?>)" class="btn btn-danger" href="#">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>