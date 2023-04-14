<?php

error_reporting (E_ALL);

define('FPDF_FONTPATH','font/');
require('fpdi.php');

$pdf = new fpdi();

$pagecount = $pdf->setSourceFile("PPOIG_PHP.pdf");


$tplidx = $pdf->ImportPage(1);

$pdf->AddPage();
$pdf->useTemplate($tplidx,0,0.1);

//Position at 1.5 cm from bottom
$pdf->SetY(10);
$pdf->SetX(200);
//Arial italic 8
$pdf->SetFont('Arial','',8);
//Page number
$pdf->SetFillColor(200,220,255);
$pdf->Cell(10,5,'1',0,0,'C',1);

$tplidx = $pdf->ImportPage(2);

$pdf->AddPage();
$pdf->useTemplate($tplidx,0,0.1);

//Position at 1.5 cm from bottom
$pdf->SetY(10);
$pdf->SetX(200);
//Arial italic 8
$pdf->SetFont('Arial','',8);
//Page number
$pdf->SetFillColor(200,220,255);
$pdf->Cell(10,5,'2',0,0,'C',1);

$tplidx = $pdf->ImportPage(3);

$pdf->AddPage();
$pdf->useTemplate($tplidx,0,0.1);

//Position at 1.5 cm from bottom
$pdf->SetY(10);
$pdf->SetX(200);
//Arial italic 8
$pdf->SetFont('Arial','',8);
//Page number
$pdf->SetFillColor(200,220,255);
$pdf->Cell(10,5,'3',0,0,'C',1);

$tplidx = $pdf->ImportPage(4);

$pdf->AddPage();
$pdf->useTemplate($tplidx,0,0.1);

//Position at 1.5 cm from bottom
$pdf->SetY(10);
$pdf->SetX(200);
//Arial italic 8
$pdf->SetFont('Arial','',8);
//Page number
$pdf->SetFillColor(200,220,255);
$pdf->Cell(10,5,'4',0,0,'C',1);

$tplidx = $pdf->ImportPage(5);

$pdf->AddPage();
$pdf->useTemplate($tplidx,0,0.1);

//Position at 1.5 cm from bottom
$pdf->SetY(10);
$pdf->SetX(200);
//Arial italic 8
$pdf->SetFont('Arial','',8);
//Page number
$pdf->SetFillColor(200,220,255);
$pdf->Cell(10,5,'5',0,0,'C',1);

$tplidx = $pdf->ImportPage(6);

$pdf->AddPage();
$pdf->useTemplate($tplidx,0,0.1);

//Position at 1.5 cm from bottom
$pdf->SetY(10);
$pdf->SetX(200);
//Arial italic 8
$pdf->SetFont('Arial','',8);
//Page number
$pdf->SetFillColor(200,220,255);
$pdf->Cell(10,5,'6',0,0,'C',1);

$tplidx = $pdf->ImportPage(7);

$pdf->AddPage();
$pdf->useTemplate($tplidx,0,0.1);

//Position at 1.5 cm from bottom
$pdf->SetY(10);
$pdf->SetX(200);
//Arial italic 8
$pdf->SetFont('Arial','',8);
//Page number
$pdf->SetFillColor(200,220,255);
$pdf->Cell(10,5,'7',0,0,'C',1);

$tplidx = $pdf->ImportPage(8);

$pdf->AddPage();
$pdf->useTemplate($tplidx,0,0.1);

//Position at 1.5 cm from bottom
$pdf->SetY(10);
$pdf->SetX(200);
//Arial italic 8
$pdf->SetFont('Arial','',8);
//Page number
$pdf->SetFillColor(200,220,255);
$pdf->Cell(10,5,'8',0,0,'C',1);

$pdf->SetAuthor('Matti Kiviharju');
$pdf->Output("PPOIG_PHP-dokumantaatio.pdf","I");
$pdf->closeParsers();

?>