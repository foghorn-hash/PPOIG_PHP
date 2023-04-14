<?php



require('polygon.php');

isset($_GET["pisteet"]) ? $pisteet = explode(",", $_GET['pisteet']) : $pisteet = explode(",", "50,200,200,250,200,150");
isset($_GET["polygoni"]) ? $polygoni = explode(",", $_GET['polygoni']) : $polygoni = explode(",", "50,200,200,250,200,150");

foreach ($polygoni as $i => $error)
{
$polygoni[$i] = $polygoni[$i] / 3 + 5;
} // Foreach lauseen ($polygoni as $i => $error) loppu

$pdf=new PDF_Polygon('P','mm','A4');
$pdf->Open();
$pdf->AddPage();
$pdf->SetLineWidth(0.4);
$pdf->SetDrawColor(200,0,0);
$pdf->Line(0 + 5,0 + 5,0 + 5,400/3 + 5);
$pdf->Line(0 + 5,0 + 5,400/3 + 5,0 + 5);
$pdf->Line(0 + 5,400/3 + 5,400/3 + 5,400/3 + 5);
$pdf->Line(400/3 + 5,0 + 5,400/3 + 5,400/3 + 5);
$ii = 0;
$key = 20;
$number = 19;
$pdf->SetDrawColor(140,0,0);
$pdf->SetLineWidth(0.1);
while ($ii < $number) 
{
$pdf->Line(0 + 5,$key/3 + 5,400/3 + 5,$key/3 + 5);
$pdf->Line($key/3 + 5,0 + 5,$key/3 + 5,400 / 3 + 5);
$key +=20;
$ii++;
} // While lauseen ($key < $number) loppu
$pdf->SetDrawColor(200,200,200);
$pdf->SetFillColor(240,240,240);
$pdf->SetLineWidth(0.2);
$pdf->Polygon($polygoni,'FD');
$pdf->SetTextColor(0,0,0);
$key1 = 0;
$key2 = 1;
$keyx = 1;
$text1 = 4;
$y = 4;
$break = 0;
$numberi = count ($pisteet);
$pdf->SetDrawColor(20,20,20);
while ($key1 < $numberi) 
{
$pdf->Circle($pisteet[$key1] / 3  + 5,$pisteet[$key2] / 3  + 5,1,'D');
$pdf->SetFont('Arial','',10);
$pdf->SetY($pisteet[$key2] / 3  + 5);
$pdf->SetX($pisteet[$key1] / 3  + 5);
$pdf->Cell(-5,-5,$keyx,0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->SetY(140+$text1);
$pdf->SetX($y);
$pdf->Write(4,"Pisteen ".$keyx." koordinaatit: x=".$pisteet[$key1]." y=".$pisteet[$key2]."");
if ($keyx > 29) 
{
$y = 70;
if ($break < 1) {$text1 = 0; $break++;}
}
if ($keyx > 59) 
{
break;
}
$key1 +=2;
$key2 +=2;
$text1 +=4;
$keyx++;
} // While lauseen ($key1 < $numberi) loppu
isset($_GET["id"]) ? $yy = $_GET['id'] : $yy = "0";
isset($_GET["date"]) ? $xx = $_GET['date'] : $xx = "00-00-0000-00-00-00";
$pdf->Output("PPOIG_PHP-raportti_".$yy."_".$xx.".pdf","I");

?>