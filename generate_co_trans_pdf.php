<?php
//SESSION_START();
//if(!$_SESSION['khjshdagsj']){
//  SESSION_DESTROY();
//}
//include "../resources/connection.php";
require_once("db.php");
require_once("assets/fpdf/fpdf.php");
//if(isset($_POST['submit3'])){
class PDF extends FPDF
{
  function Header()
  {
      // Logo
      $this->Image('demo/photos/Agribank--Logo.png',10,6,30);
      $this->Image('demo/photos/Agribank--Logo.png',170,6,30);
      // Arial bold 15
      $this->SetFont('Arial','B',15);
      // Move to the right
      $this->Cell(60);
      // Title
      $this->Cell(70,10,'CO-BANKING TRANSACTIONS REPORT',0,0,'C');
      // Line break
      $this->Ln(30);
  }
  function Footer()
  {
      // Position at 1.5 cm from bottom
      $this->SetY(-15);
      // Arial italic 8
      $this->SetFont('Arial','I',8);
      // Page number
      $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  }
}
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont("Times","",8);
//$pdf->Cell(20,10,"ID.No",1,0,'C');
$pdf->Cell(30,10,"Detail",1,0,'C');
$pdf->Cell(20,10,"Date",1,0,'C');
$pdf->Cell(30,10,"Transfer Type",1,0,'C');
$pdf->Cell(10,10,"Dr / Cr",1,0,'C');
$pdf->Cell(20,10,"Amount",1,0,'C');
$pdf->Cell(20,10,"Running Balance",1,0,'C');
$pdf->Cell(15,10,"Detail",1,0,'C');
$pdf->Cell(30,10,"RRN",1,0,'C');
$pdf->Cell(20,10,"Phone No",1,1,'C');
$pdf->SetFont("Times","B",7);
$res=mysqli_query($con,"SELECT * FROM agribank");
while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
  $pdf->Cell(30,10,$row['transaction_detail_1'],1,0,'C');
  $pdf->Cell(20,10,$row['datez'],1,0,'C');
  $pdf->Cell(30,10,$row['transaction_type'],1,0,'C');
  $pdf->Cell(10,10,$row['dr_cr'],1,0,'C');
  $pdf->Cell(20,10,$row['amount'],1,0,'C');
  $pdf->Cell(20,10,$row['running_balance'],1,0,'C');
  $pdf->Cell(15,10,$row['transaction_detail_2'],1,0,'C');
  $pdf->Cell(30,10,$row['rrn'],1,0,'C');
  $pdf->Cell(20,10,$row['phone_no'],1,1,'C');

}
$pdf->output();
//}
?>
