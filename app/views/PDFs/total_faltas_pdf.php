<?php

//criando a função pdf
function pdf()
{
    //requerindo o arquivo model.php e estanciando a class model_usuario
    require_once('../../models/model.php');
    $select = new model_usuario;

    //requerindo o arquivo fpdf.php
    require_once('../../assets/FPDF/fpdf.php');

    //estanciando a class FPDF tem com a pagina em retrato, em pt e tipo de folha A4
    $pdf = new FPDF('P', 'pt', 'A4');

    //criando a pagina
    $pdf->AddPage();

    //definindo a fonte como Arial, sem nenhum estilo, e de tamanho 30pt
    $pdf->SetFont('Arial', '', '30');
    //defininco a cor do texto
    $pdf->SetTextColor(255, 255, 255);
    //definindo a com do fundo 
    $pdf->SetFillColor(63, 72, 204);
    //imprindo a um nome
    $pdf->Cell(535, 40, 'Total de faltas', 1, 1, 'C', true);
    //quebrando a linha
    $pdf->Ln(40);

    $pdf->SetFont('Arial', '', '20');
    $pdf->SetFillColor(63, 72, 204);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Cell(327.5, 30, 'Nome', 1, 0, 'C', true);
    $pdf->Cell(207.5, 30, 'Faltas', 1, 1, 'C', true);

    $linha = 1;
    //chamando a função list_aluno para mostrar a lista de alunos
    //usando o foreach para transforma a matriz em array
    foreach ($select->list_faltas() as $dados) {

        $cor = $linha % 2 ? 255 : 195;
        $pdf->SetFont('Arial', '', '20');
        $pdf->SetFillColor($cor, $cor, $cor);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(327.5, 30, utf8_decode($dados['nome']), 1, 0, 'C', true);
        $pdf->Cell(207.5, 30, $dados['COUNT(atrasos.nome)'], 1, 1, 'C', true);

        $cor++;
    }
    //fechando o pdf
    $pdf->Output('', 'total de faltas');
}
//chamando a função para mostra o pdf
pdf();
