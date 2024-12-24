<?php

function pdf()
{
    require_once('../../models/model.php');
    $select = new model_usuario;

    require_once('../../assets/FPDF/fpdf.php');
    $pdf = new FPDF('P', 'pt', 'A4');

    $pdf->AddPage();

    $pdf->SetFont('Arial', '', '30');
    $pdf->SetTextColor(255, 255, 255);
    $pdf->SetFillColor(63, 72, 204);
    $pdf->Cell(535, 40, 'Lista de atrasos', 1, 1, 'C', true);
    $pdf->Ln(40);

    $pdf->SetFont('Arial', '', '20');
    $pdf->SetFillColor(63, 72, 204);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Cell(38.3, 30, 'ID', 1, 0, 'C', true);
    $pdf->Cell(358.3, 30, 'Nome', 1, 0, 'C', true);
    $pdf->Cell(138.3, 30, 'Matricula', 1, 1, 'C', true);

    $linha = 1;
    foreach ($select->list_aluno() as $dados) {

        $cor = $linha % 2 ? 255 : 195;
        $pdf->SetFont('Arial', '', '17');
        $pdf->SetFillColor($cor, $cor, $cor);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(38.3, 30, $dados['id'], 1, 0, 'C', true);
        $pdf->Cell(358.3, 30, utf8_decode($dados['nome']), 1, 0, 'C', true);
        $pdf->Cell(138.3, 30, $dados['matricula'], 1, 0, 'C', true);
        $cor++;
    }
    $pdf->Output();
}
pdf();
