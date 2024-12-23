<?php

//requerindo o arquivo connect para fazer a conexão com o banco de dados
require_once('../config/connect.php');

//criando a class model sendo uma class herdada da class connect
class model_usuario extends connect
{
    //criando os atributos com os nomes das tabelas do banco de dados
    private $alunos;
    private $atrasos;
    private $numero_atrasos;

    //criando o construtor para ter o construtor da class mãe e dando os nome para os atributos
    function __construct()
    {
        parent::__construct();
        $this->alunos = 'alunos';
        $this->atrasos = 'atrasos';
        $this->numero_atrasos = 'numero_atrasos';
    }

    //Crianda a funções da class
    function registrar($nome, $matricula, $turma, $dia, $hora)
    {
    
        $result_check = $this->connect->prepare("SELECT * FROM $this->alunos WHERE matricula = :matricula");

        $result_check->bindParam(':matricula', $matricula);
        $result_check->execute();

        //se o numero de linhas for maior que 0
        if ($result_check->rowCount() > 0) {

            $result_registro = $this->connect->prepare("INSERT INTO atrasos VALUES (DEFAULT, :nome, :matricula, :turma, :dia, :hora)");

            $result_registro->bindParam(':nome', $nome);
            $result_registro->bindParam(':matricula', $matricula);
            $result_registro->bindParam(':turma', $turma);
            $result_registro->bindParam(':dia', $dia);
            $result_registro->bindParam(':hora', $hora);

            $result_registro->execute();

            /*Se result_re for verdadeiro*/
            if ($result_registro) {

                return "Registro feito com sucesso!";
            } else {

                //se for falso
                return "Erro ao fazer o registro!";
            }
        } else {

            // se o numero de rows for menor que 0
            return "Aluno não cadastrado!";
        }
    }
    function list_aluno()
    {

        $result_list_aluno = $this->connect->query("SELECT * FROM $this->alunos");

        $fetch_assoc = $result_list_aluno->fetchAll(PDO::FETCH_ASSOC);

        return $fetch_assoc;
    }

    function list_atraso()
    {

        $result_list_atraso = $this->connect->prepare("SELECT * FROM  $this->atrasos");

        $result_list_atraso->execute();
        $fetch_assoc = $result_list_atraso->fetchAll(PDO::FETCH_ASSOC);

        return $fetch_assoc;
    }
    function list_faltas()
    {


        $result_list_faltas = $this->connect->prepare("SELECT alunos.nome, COUNT(atrasos.nome) FROM alunos INNER JOIN atrasos
        on alunos.matricula = atrasos.matricula
        GROUP by alunos.nome");

        $result_list_faltas->execute();
        $fetch_assoc = $result_list_faltas->fetchAll(PDO::FETCH_ASSOC);

        return $fetch_assoc;
    }
}
