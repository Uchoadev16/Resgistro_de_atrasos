<?php

require_once('../models/model.php');
$model = new model_usuario;
/*Se existe um post registrar e não estiver vazío nomephp e não estiver vazío matriculaphp e não estiver vazío turmaphp e não estiver vazío diaphp e não estiver vazío horaphp*/
if (isset($_POST['registrar']) && !empty($_POST['nomephp']) && !empty($_POST['matriculaphp']) && !empty($_POST['turmaphp']) && !empty($_POST['diaphp']) && !empty($_POST['horaphp'])) {

    /*crianda as varíaveis */
    $nome = $_POST['nomephp'];
    $matricula = $_POST['matriculaphp'];
    $turma = $_POST['turmaphp'];
    $dia = $_POST['diaphp'];
    $hora = $_POST['horaphp'];

    /*chamando a função registrar, passando com paramatros nome, matricula, turma, dia e hora */
    $result = $model->registrar($nome, $matricula, $turma, $dia, $hora);
    switch ($result) {

        case 1:
            header('location:../index.php?certo');
            exit();
        case 2:
            header('location:../index.php?erro');
            exit();
        case 3:
            header('location:../index.php?nao_existe');
            exit();
    }
} else if (isset($_POST['cadastrar']) && !empty($_POST['nomephp']) && !empty($_POST['matriculaphp']) && !empty($_POST['turmaphp'])) {

    $nome = $_POST['nomephp'];
    $matricula = $_POST['matriculaphp'];
    $turma = $_POST['turmaphp'];

    $result = $model->cadastrar($nome, $matricula, $turma);
    switch ($result) {

        case 1:
            header('location:../views/inserir.php?certo');
            exit();
        case 2:
            header('location:../views/inserir.php?erro');
            exit();
        case 3:
            header('location:../views/inserir.php?ja_existe');
            exit();
        default:
            header('location:../index.php');
            exit();
    }
} else {

    header('location:../index.php');
    exit();
}
