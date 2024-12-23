<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>
    <h1>Registrar atraso</h1>
    <a href="alunos.php">Mostrar lista de alunos</a><br>
    <a href="atrasos.php">Mostrar lista de atrasos</a><br>
    <a href="Total_Faltas.php">Mostrar total de faltas</a><br>
    <fieldset>
        <form action="controllers/controller_main.php" method="post">
            <label for="nomeJS">Nome:</label>
            <input type="text" name="nomephp" id="nomejs"><br>
            <label for="matriculaJS">Matrícula:</label>
            <input type="number" name="matriculaphp" id="matriculajs"><br>
            <label for="turmaJS">turma:</label>
            <select name="turmaphp" id="turmajs">
                <option value="1ºA">1ºA</option>
                <option value="1ºB">1ºB</option>
                <option value="1ºC">1ºC</option>
                <option value="1ºD">1ºD</option>
                <option value="2ºA">2ºA</option>
                <option value="2ºB">2ºB</option>
                <option value="2ºC">2ºC</option>
                <option value="2ºD">2ºD</option>
                <option value="3ºA">3ºA</option>
                <option value="3ºB">3ºB</option>
                <option value="3ºC">3ºC</option>
                <option value="3ºD">3ºD</option>
            </select><br>
            <label for="diaJS">Dia:</label>
            <input type="date" name="diaphp" id="diajs"><br>
            <label for="horaJS">Hora:</label>
            <input type="time" name="horaphp" id="horajs"><br>
            <button type="submit" name="registrar">Registrar</button>
        </form>
    </fieldset>

    <?php

    if (isset($_GET['resposta'])) {
        $resposta = $_GET['resposta'];
        echo $resposta;
    }
    ?>
</body>

</html>