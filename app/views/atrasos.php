<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de atrasos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f7ff;
            color: #003366;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #0066cc;
        }

        nav {
            display: flex;
        }

        a.opc {
            color: #0066cc;
            text-decoration: none;
            font-size: 18px;
            margin: 10px 50px 10px 130px;
            border: 1px solid black;
            border-radius: 24px;
            padding: 10px;
        }

        a:hover {
            color: #003366;
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        tr {
            background-color: #cce0ff;
        }

        th,
        td {
            border: 1px solid #3399ff;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #3399ff;
            color: white;
        }

        td {
            background-color: #ffffff;
        }

        .pdf-link {
            display: inline-block;
            margin-top: 15px;
            padding: 10px;
            background-color: #0066cc;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .pdf-link:hover {
            background-color: #003366;
        }
    </style>
</head>

<body>
    <nav>
        <a class="opc" href="../index.php">Fazer registro</a><br>
        <a class="opc" href="inserir.php">Cadastrar aluno</a><br>
        <a class="opc" href="alunos.php">Ver lista de alunos</a><br>
        <a class="opc" href="Total_Faltas.php">Mostrar total de faltas</a><br>
    </nav>
    <h1>Lista de atrasos</h1>
    <a href="./PDFs/atrasos_pdf.php" class="pdf-link">Baixar PDF</a>
    <?php

    //requerindo o arquivo model.php
    require_once('../models/model.php');

    //estanciando a class model_usuario
    $controller_list_atrasos = new model_usuario;
    //chamando a função list_atrasos para mostrar todos os atrasos ocorridos
    $fetch_assoc = $controller_list_atrasos->list_atrasos();
    ?>
    <table>
        <tr>
            <th>id</th>
            <th>Nome</th>
            <th>Matrícula</th>
            <th>Turma</th>
            <th>Dia</th>
            <th>Hora</th>
        </tr>

        <?php //usando o foreach para transforma a matriz em array
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