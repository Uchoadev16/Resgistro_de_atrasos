<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        :root {
            --azul-claro: #add8e6;
            --azul-mediano: #4682b4;
            --azul-escuro: #1e3a5f;
            --azul-dark: #003366;
            --branco: #ffffff;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: var(--azul-claro);
            color: var(--azul-escuro);
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: var(--azul-dark);
            margin-top: 20px;
        }

        nav {
            display: flex;

        }

        a {
            color: var(--azul-dark);
            text-decoration: none;
            font-size: 18px;
            margin: 10px 50px 10px 130px;
            border: 1px solid black;
            border-radius: 24px;
            padding: 10px;
        }

        a:hover {
            color: var(--azul-mediano);
        }

        fieldset {
            background-color: var(--branco);
            border: 2px solid var(--azul-mediano);
            padding: 20px;
            margin: 20px auto;
            width: 60%;
            border-radius: 10px;
        }

        label {
            font-size: 16px;
            color: var(--azul-dark);
            display: block;
            margin-top: 10px;
        }

        input,
        select,
        button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid var(--azul-mediano);
            box-sizing: border-box;
        }

        button {
            background-color: var(--azul-mediano);
            color: var(--branco);
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: var(--azul-escuro);
        }

        .message {
            text-align: center;
            font-size: 18px;
            margin-top: 20px;
        }

        .message.success {
            color: green;
        }

        .message.error {
            color: red;
        }

        .message.info {
            color: rgb(226, 56, 56);
        }
    </style>
</head>

<body>
    <h1>Registrar atraso</h1>
    <nav>
        <a href="views/alunos.php">Mostrar lista de alunos</a><br>
        <a href="views/atrasos.php">Mostrar lista de atrasos</a><br>
        <a href="views/Total_Faltas.php">Mostrar total de faltas</a><br>
        <a href="views/inserir.php">Cadastrar aluno</a><br>
    </nav>
    <fieldset>
        <form action="controllers/controller_main.php" method="post">
            <label for="nomeJS">Nome:</label>
            <input type="text" name="nomephp" id="nomejs"><br>
            <label for="matriculaJS">Matrícula:</label>
            <input type="number" name="matriculaphp" id="matriculajs"><br>
            <label for="turmaJS">Turma:</label>
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
    if (isset($_GET['certo'])) {
        echo "<p class='message success'>Atraso registrado com sucesso!</p>";
    }
    if (isset($_GET['erro'])) {
        echo "<p class='message error'>ERRO ao registrar!</p>";
    }
    if (isset($_GET['nao_existe'])) {
        echo "<p class='message info'>Aluno(a) não existente!</p>";
    }
    ?>
</body>

</html>