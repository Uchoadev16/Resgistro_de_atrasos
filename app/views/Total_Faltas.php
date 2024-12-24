<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total de faltas</title>
    <style>
        table {
            border: 1px solid black;
        }

        tr {
            border: 1px solid black;
        }

        td {
            border: 1px solid black;
            padding: 3px 3px 3px 3px;
        }
    </style>
</head>

<body>
    <a href="../index.php">Fazer registro</a><br>
    <a href="inserir.php">Cadastrar aluno</a><br>
    <a href="alunos.php">Ver lista de alunos</a><br>
    <a href="atrasos.php">Ver lista de atrasos</a><br>

    <h1>Total de faltas de cada aluno</h1>

    <a href="./PDFs/total_faltas_pdf.php">Baixar PDF</a>
    <?php

    //requerindo o arquivo controller_usuario.php
    require_once('../models/model.php');

    //fazendo a estanciação da class controller_usuario e chamando a função cotroller_list_faltas
    $controller_list_faltas = new model_usuario;
    $fetch_assoc = $controller_list_faltas->list_faltas();
    ?>

    <table>
        <tr>
            <td>Nome</td>
            <td>faltas</td>
        </tr>

        <?php //usando o foreach para puxar os dados do banco de dados
        foreach ($fetch_assoc as $value) {
        ?>
            <tr>
                <td><?= $value['nome'] ?></td>
                <td><?= $value['COUNT(atrasos.nome)'] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>