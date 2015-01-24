<?php

require "fpdf.php";

class PDF extends FPDF
{
}

$Date1= $_POST['date1'];
$Date2= $_POST['date2'];

$Date3=date("d-m-Y",strtotime($Date1));
$Date4=date("d-m-Y",strtotime($Date2));

//DELCARACION DE LA HOJA
$pdf=new PDF('P', 'mm', 'Letter');
$pdf->SetMargins(20, 18);
$pdf->AliasNbPages();
$pdf->AddPage();


//DATOS DEL TITULO
$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 7);
$pdf->Cell(30,25,'',0,0,'C',$pdf->Image('../images/logo.png', 20,12, 19));
$pdf->Cell(0, 5, utf8_decode(''), 0, 1, 'L');
$pdf->Cell(0, 5, utf8_decode('Sale Point'), 0, 1, 'C');
$pdf->Cell(0, 5, 'Report of the '.$Date3. ' to ' .$Date4, 0, 1, 'C');

//DATOS DE CONECCION
$link = mysql_connect('localhost', 'root', 'root')
    or die('No se pudo conectar: ' . mysql_error());
    mysql_select_db('sale_point') or die('No se pudo seleccionar la base de datos');

//MOSTRAMOS LA TABLA
$pdf->Ln();
$pdf->Cell(20, 5, "id_sale",1,0, 'C');
$pdf->Cell(25, 5, "id_sale_detail",1,0, 'C');
$pdf->Cell(55, 5, "id_client",1,0, 'C');
$pdf->Cell(10, 5, "total",1,0, 'C');
$pdf->Cell(10, 5, "date",1,0, 'C');


$sql="SELECT * FROM sales where date >='$Date1' and date <='Date2' ";
$rec=mysql_query($sql);
while($row=mysql_fetch_array($rec))
{
	$pdf->Cell(20, 5, $row['id_sale'],1,0, 'L');
	$pdf->Cell(25, 5, $row['id_sale_detail'],1,0, 'L');
	$pdf->Cell(55, 5, $row['id_client'],1,0, 'L');
	$pdf->Cell(55, 5, $row['total'],1,0, 'L');
	$pdf->Cell(10, 5, $row['date'],1,0, 'L');
}




$pdf->Output();
//$pdf->Output("Contrato_".$per_Rut."-".$per_DV.".pdf","D");



?>
