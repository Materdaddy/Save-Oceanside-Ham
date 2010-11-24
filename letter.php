<?php

$cannedMessage="To: The City Council of Oceanside, California

Subject: Amateur Radio Petition

I am asking that you support Oceanside's compliance with the intent of Congress of the United States as stated in Public Law 103-408. This law specifically identifies five areas where Radio Amateurs contribute to the public good as follows.

(1) Voluntary noncommercial communication service, particularly with respect to providing safety of life and property through the use of radio communication;
(2) Contributing service to the advancement of telecommunications;
(3) Service which encourages improvement of an individual's technical and operating skills;
(4) Service providing a national reservoir of trained operators, technicians and electronics experts; and
(5) Service enhancing international good will.

Based on these findings, the Congress declared that reasonable accommodation should be made for the effective operation of amateur radio from residences, private vehicles and public areas, and that regulation at all levels of government should facilitate and encourage amateur radio operation as a public benefit. With the advent of Homeland Security and the addition of California PRB-1, it is time for the City of Oceanside to take strong steps to insure that amateur radio as a resource is vigorously supported.

Please provide guidance to the framers of the new zoning ordinance, Article 39, such that they incorporate the requirements of amateur radio and facilitate its use.";



$fName=$_POST['name'];
$fAddy=$_POST['addy'];
$fCity=$_POST['city'];
$fState=$_POST['astate'];
$fZip=$_POST['zip'];
$fPhone=$_POST['phone'];
$fCall=$_POST['call'];


$tName='City Council';
$tAddy='300 N. Coast Highway';
$tCity='Oceanside';
$tState='CA';
$tZip='92054';
//$tPhone='XXX-XXX-XXXX';

$customMessage=(!empty($_POST['acustom'])?$_POST['acustom']:"");

$path = '/usr/share/php/fpdf';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
require('fpdf.php');

$pdf=new FPDF();

$pdf->SetMargins(35,35,35);
$pdf->AddPage();

$pdf->SetFont('Times','',10);
$pdf->Ln(4);
$pdf->setX(140);
$pdf->MultiCell(40,4,"$fName\n$fAddy\n$fCity, $fState $fZip\n$fPhone\n$fCall",0,'L');
$pdf->Ln(3);
$pdf->setX(140);
$pdf->Cell(30,3,date('F jS, Y'));

$pdf->Ln(12);

$pdf->MultiCell(80,4,"$tName\n$tAddy\n$tCity, $tState $tZip");
$pdf->Ln(8);

$pdf->MultiCell(0,4,$cannedMessage);
$pdf->Ln(4);
$pdf->MultiCell(0,4,$customMessage);
$pdf->Ln(10);

$pdf->Cell(30,4,"Sincerely,");
$pdf->Ln(18);

$pdf->Cell(30,4,"$fName");
$pdf->Output("Save Oceanside Ham.pdf", "I");

?>
