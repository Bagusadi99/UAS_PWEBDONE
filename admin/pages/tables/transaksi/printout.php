<?php
// memanggil library FPDF
require('fpdf.php');
include_once ("../../../../helper/connection.php");
 
// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
 
$pdf->SetFont('Times','B',13);
$pdf->Cell(200,10,'DATA TRANSAKSI',0,0,'C');
 
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,7,'NO',1,0,'C');
$pdf->Cell(30,7,'ID TRANSAKSI' ,1,0,'C');
$pdf->Cell(35,7,'NAMA CUSTOMER',1,0,'C');
$pdf->Cell(30,7,'JUDUL BUKU',1,0,'C');
$pdf->Cell(35,7,'TANGGAL',1,0,'C');
$pdf->Cell(30,7,'JUMLAH',1,0,'C');
$pdf->Cell(25,7,'TOTAL',1,0,'C');
 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no=1;
$data = mysqli_query($con,"SELECT  * FROM transaksi");
while($d = mysqli_fetch_array($data)){
  $pdf->Cell(10,6, $no++,1,0,'C');
  $pdf->Cell(30,6, $d['id_transaksi'],1,0);
  $pdf->Cell(35,6, $d['id_customer'],1,0);  
  $pdf->Cell(30,6, $d['id_buku'],1,0);
  $pdf->Cell(35,6, $d['tgl_transaksi'],1,0); 
  $pdf->Cell(30,6, $d['jumlah'],1,0); 
  $pdf->Cell(25,6, $d['total'],1,1); 
}
 
$pdf->Output();
 
?>