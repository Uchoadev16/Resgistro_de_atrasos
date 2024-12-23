<?php 

require_once('../models/model.php');

/*Se existe um post registrar e não estiver vazío nomephp e não estiver vazío matriculaphp e não estiver vazío turmaphp e não estiver vazío diaphp e não estiver vazío horaphp*/
if (isset($_POST['registrar']) && !empty($_POST['nomephp']) && !empty($_POST['matriculaphp']) && !empty($_POST['turmaphp']) && !empty($_POST['diaphp']) && !empty($_POST['horaphp'])) {

    /*crianda as varíaveis */
    $nome = $_POST['nomephp'];
    $matricula = $_POST['matriculaphp'];
    $turma = $_POST['turmaphp'];
    $dia = $_POST['diaphp'];
    $hora = $_POST['horaphp'];

    /*chamando a função registrar, passando com paramatros nome, matricula, turma, dia e hora */
    $result = $controller_registrar->registrar($nome, $matricula, $turma, $dia, $hora);
    if()
}
?>