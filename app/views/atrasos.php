<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de atrasos</title>
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

    <a href="index.php">Fazer registro</a><br>
    <a href="alunos.php">Ver lista de alunos</a><br>
    <a href="Total_Faltas.php">Mostrar total de faltas</a><br>

    <h1>Lista de atrasos</h1>

    <?php

    //requerindo o arquivo controller_usuario.php
    require_once('../controllers/controller_usuario.php');

    //fazendo a estanciação da class controller_usuario e chamando a função controller_list_atrasos
    $controller_list_atrasos = new controller_usuario;
    $fetch_assoc = $controller_list_atrasos->controller_list_atrasos();
    ?>
    <table>
        <tr>
            <td>id</td>
            <td>Nome</td>
            <td>Matrícula</td>
            <td>Turma</td>
            <td>Dia</td>
            <td>Hora</td>
        </tr>

        <?php //usando o foreach para puxar os dados do banco de dados
        foreach ($fetch_assoc as $value) {
        ?>
            <tr>
                <td><?= $value['id'] ?></td>
                <td><?= $value['nome'] ?></td>
                <td><?= $value['matricula'] ?></td>
                <td><?= $value['turma'] ?></td>
                <td><?= $value['dia'] ?></td>
                <td><?= $value['hora'] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>