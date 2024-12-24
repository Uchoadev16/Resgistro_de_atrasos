<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir alunos</title>
</head>

<body>
    <h1>Cadastrar aluno</h1>
    <a href="../index.php">Fazer registro</a><br>
    <a href="alunos.php">Mostrar lista de alunos</a><br>
    <a href="atrasos.php">Mostrar lista de atrasos</a><br>
    <a href="Total_Faltas.php">Mostrar total de faltas</a><br>
    <fieldset>
        <form action="../controllers/controller_main.php" method="post">
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
            <button type="submit" name="cadastrar">Cadastrar</button>
        </form>
        <?php
        if (isset($_GET['certo'])) {
            echo "Aluno cadastrado com sucesso!";
        }
        if (isset($_GET['erro'])) {
            echo "[ERRO] ao cadastrar o aluno!";
        }
        if (isset($_GET['ja_existe'])) {
            echo "Aluno já cadastrado";
        }
        ?>
    </fieldset>

</body>

</html>