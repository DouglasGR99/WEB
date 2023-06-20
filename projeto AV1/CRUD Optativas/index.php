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
            <form id="perguntaForm" autocomplete="off">
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
                            <td><input class="btn btn-sucess" type="submit" value="Salvar"></td>
                        </tr>
                    </table>
                </fieldset>
            </form>
        </div>
        <div class="table-section">
            <!-- Mostrando os dados do banco de dados -->
            <table id="perguntaTable" class="tabela">
                <thead>
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
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>