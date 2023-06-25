<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>CRUD Pergunta Discursiva php</title>

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container">
    <div class="header">
        <!-- Cabeçalho -->
        <h1>CRUD Perguntas Discursivas</h1>
        <a href="../CRUD%20Optativas/index.php" class="btn">Perguntas Optativas</a>
    </div>
    <div class="content">
        <div class="form-section">
            <!-- Formulário para inserir dados -->
            <form method="post" autocomplete="off" id="formDiscursivas">
                <legend>Criar pergunta</legend>
                <table class="tabela">
                    <tr>
                        <td>Enunciado:</td>
                        <td><input id="enunciado" type="text" name="enunciado" required></td>
                    </tr>
                    <tr>
                        <td>Resposta:</td>
                        <td><label for="resposta"></label><input id="resposta" type="text" name="resposta" required></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input class="btn btn-sucess" type="submit" name="salvar" value="Salvar"></td>
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
                    <th>Resposta correta</th>
                    <th>Ação</th>
                </tr>
                <?php
                global $connect;
                require 'conectaDIS.php';

                //delete
                if (isset($_GET['delete_id'])) {
                    $stmt = $connect->prepare("DELETE FROM discursivas WHERE id = :id");
                    $stmt->bindParam(":id", $_GET['delete_id']);
                    $stmt->execute();
                    header("Location: index.php");
                }

                $stmt = $connect->prepare("SELECT * FROM discursivas");
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
                    <tr>
                        <td><?php echo $row->id; ?></td>
                        <td><?php echo $row->enunciado; ?></td>
                        <td><?php echo $row->resposta; ?></td>
                        <td>
                            <a onclick="return confirm('Tem certeza que deseja editar?')" class="btn btn-warning" href="editaDIS.php?edit_id=<?php echo $row->id; ?>">Editar</a>
                            <br>
                            <a onclick="return confirm('Tem certeza que deseja deletar?')" class="btn btn-danger" href="?delete_id=<?php echo $row->id; ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<script>
    document.getElementById('formDiscursivas').addEventListener('submit', function(event) {
        event.preventDefault(); // Impede o envio do formulário

        // Obtenha os valores dos campos do formulário
        var enunciado = document.getElementById('enunciado').value;
        var resposta = document.getElementById('resposta').value;

        // Crie um objeto com os dados do formulário
        var dados = {
            enunciado: enunciado,
            resposta: resposta
        };

        // Converta os dados para JSON
        var jsonData = JSON.stringify(dados);

        // Faça uma requisição HTTP para o arquivo PHP
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                // Ação a ser executada após a inserção no banco de dados
                console.log(this.responseText);
                location.reload(); // Atualize a página após a inserção
            }
        };
        xhttp.open('POST', 'inserir_dados.php', true);
        xhttp.setRequestHeader('Content-type', 'application/json');
        xhttp.send(jsonData);
    });
</script>
</body>
</html>