<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de alunos</title>
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
    <a href="atrasos.php">Ver lista de atraso</a><br>
    <a href="Total_Faltas.php">Mostrar total de faltas</a><br>

    <h1>Lista de alunos</h1>
    <a href="./PDFs/alunos_pdf.php">Baixar PDF</a>
    <?php

    //requerindo o arquivo controller_usuario.php
    require_once('../models/model.php');

    //fazendo a estanciação da class controller_usuario e chamando a função list_aluno
    $controller_list_aluno = new model_usuario;
    $fetch_assoc = $controller_list_aluno->list_aluno();
    ?>

    <table>
        <tr>
            <td>id</td>
            <td>Nome</td>
            <td>Matrícula</td>
        </tr>

        <?php //usando o foreach para puxar os dados do banco de dados
        foreach ($fetch_assoc as $value) {
        ?>
            <tr>
                <td><?= $value['id'] ?></td>
                <td><?= $value['nome'] ?></td>
                <td><?= $value['matricula'] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>