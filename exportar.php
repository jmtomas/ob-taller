<?php
require('includes/fpdf182/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Helvetica', 'B', 12);
$pdf->MultiCell(0, 6, $_POST["listado"]);
$pdf->Output();
?>