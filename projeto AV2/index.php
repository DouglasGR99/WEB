<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Concurso</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container">
    <div class="header">
        <!-- Cabeçalho -->
        <h1>Apresentação de candidatos e fiscais</h1>
    </div>


    <div class="content">
        <div class="form-section">
            <!-- Formulário para incluir fiscal -->
            <form method="post" autocomplete="off" id="formFilscal">
                <legend>Incluir Fiscal</legend>
                <table class="tabela">
                    <tr>
                        <td>CPF:</td>
                        <td><input id="CPF" type="text" name="CPF" required></td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td><label for="nome"></label><input id="nome" type="text" name="nome" required></td>
                    </tr>
                    <tr>
                        <td>Sala:</td>
                        <td><label for="cod_sala"></label><input id="cod_sala" type="text" name="cod_sala" required></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input class="btn btn-sucess" type="submit" name="salvar" value="Salvar" onclick="enviarDados()"></td>
                    </tr>
                </table>
            </form>
        </div>

        <!-- Mostrando os dados dos candidatos -->
        <div class="table-section">
            <h2>Candidatos</h2>
            <table class="tabela">
                <tr>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>RG</th>
                    <th>email</th>
                    <th>cargo pretendido</th>
                    <th>sala</th>
                    <th>Ação</th>
                </tr>
                <?php
                global $connect;
                require 'conectaDB.php';

                $stmt = $connect->prepare("SELECT * FROM candidato");
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
                    <tr>
                        <td><?php echo $row->CPF; ?></td>
                        <td><?php echo $row->Nome; ?></td>
                        <td><?php echo $row->RG; ?></td>
                        <td><?php echo $row->email; ?></td>
                        <td><?php echo $row->cargo_pretendido; ?></td>
                        <td><?php echo $row->cod_sala; ?></td>
                        <td><a onclick="return confirm('Tem certeza que deseja alterar sala?')" class="btn btn-warning" href="altera_sala.php?edit_id=<?php echo $row->id; ?>">Alterar sala</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <!-- Mostrando os dados dos fiscais -->
        <div class="table-section">
            <h2>Fiscais</h2>
            <table class="tabela">
                <tr>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>sala</th>
                </tr>
                <?php
                global $connect;
                require 'conectaDB.php';

                $stmt = $connect->prepare("SELECT * FROM fiscal");
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
                    <tr>
                        <td><?php echo $row->CPF; ?></td>
                        <td><?php echo $row->Nome; ?></td>
                        <td><?php echo $row->cod_sala; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>