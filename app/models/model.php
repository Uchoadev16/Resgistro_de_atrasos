<?php

//requerindo o arquivo connect para fazer a conexão com o banco de dados
if (file_exists('../config/connect.php')) {
    
    include_once('../config/connect.php');
} else {
    include_once('../../config/connect.php');
}

//criando a class model sendo uma class herdada da class connect
class model_usuario extends connect
{
    //atributos
    private $alunos;
    private $atrasos;

    //metodos especiais
    function __construct()
    {
        parent::__construct();
        $this->alunos = 'alunos';
        $this->atrasos = 'atrasos';
    }

    //metodos
    function registrar($nome, $matricula, $turma, $dia, $hora)
    {
        $result_check = $this->connect->prepare("SELECT * FROM $this->alunos WHERE matricula = :matricula");
        $result_check->bindParam(':matricula', $matricula);
        $result_check->execute();

        //se o numero de linhas for maior que 0
        if ($result_check->rowCount() > 0) {

            $result_registro = $this->connect->prepare("INSERT INTO $this->atrasos VALUES (DEFAULT, :nome, :matricula, :turma, :dia, :hora)");
            $result_registro->bindParam(':nome', $nome);
            $result_registro->bindParam(':matricula', $matricula);
            $result_registro->bindParam(':turma', $turma);
            $result_registro->bindParam(':dia', $dia);
            $result_registro->bindParam(':hora', $hora);
            $result_registro->execute();

            //Se result_registro for verdadeiro
            if ($result_registro) {

                return 1;
            } else {

                //se for falso
                return 2;
            }
        } else {

            // se o numero de rows for menor que 0
            return 3;
        }
    }

    function cadastrar($nome, $matricula, $turma)
    {

        $result_cadastro = $this->connect->prepare("SELECT * FROM $this->alunos WHERE nome = :nome || matricula = :matricula");
        $result_cadastro->BindValue(':nome', $nome);
        $result_cadastro->BindValue(':matricula', $matricula);
        $result_cadastro->execute();

        //se for igual a 0
        if ($result_cadastro->rowCount() == 0) {

            $result_cadastro = $this->connect->prepare("INSERT INTO $this->alunos VALUES (DEFAULT, :nome, :matricula, :turma)");

            $result_cadastro->bindParam(':nome', $nome);
            $result_cadastro->bindParam(':matricula', $matricula);
            $result_cadastro->bindParam(':turma', $turma);
            $result_cadastro->execute();

            //Se result_cadastro for verdadeiro
            if ($result_cadastro) {

                return 1;
            } else {

                //se for falso
                return 2;
            }
        } else {

            //se não for igual 0
            return 3;
        }
    }
    function list_aluno()
    {
        $result_list_aluno = $this->connect->query("SELECT * FROM $this->alunos");
        $fetch_assoc = $result_list_aluno->fetchAll(PDO::FETCH_ASSOC);

        return $fetch_assoc;
    }

    function list_atrasos()
    {
        $result_list_atraso = $this->connect->prepare("SELECT * FROM  $this->atrasos");
        $result_list_atraso->execute();
        $fetch_assoc = $result_list_atraso->fetchAll(PDO::FETCH_ASSOC);

        return $fetch_assoc;
    }
    function list_faltas()
    {
        //selecionado o nome da tabela alunos e contando os nomes da tabela atrasos, onde a matricula da tabela aluno é igual a matricula da tabela atrasos, agrupando por nome da tabela aluno
        $result_list_faltas = $this->connect->prepare("SELECT alunos.nome, COUNT(atrasos.nome) FROM alunos INNER JOIN atrasos 
        on alunos.matricula = atrasos.matricula 
        GROUP by alunos.nome");
        $result_list_faltas->execute();
        $fetch_assoc = $result_list_faltas->fetchAll(PDO::FETCH_ASSOC);

        return $fetch_assoc;
    }
}
