<?php
require "../fpdf/fpdf.php";

$dbh = new PDO ('mysql:host=localhost;dbname=db_ukk_insapra', "root", "");

class myPDF extends FPDF{
    function header(){
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(276,5,'APLIKASI INVESTARIS SARANA DAN PRASANA(INSAPRA)', 0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(276,10,'DATA SUPPLIER',0,0,'C');
        $this->Ln(20);
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0, 'C');
    }
    function headerTable(){
        $this->SetFont('Times', 'B' , 11);
        $this->Cell(55,10,'Kode Supplier',1,0,'C');
        $this->Cell(55,10,'Nama Supplier',1,0,'C');
        $this->Cell(55,10,'Alamat',1,0,'C');
        $this->Cell(55,10,'Telepon',1,0,'C');
        $this->Cell(55,10,'Kota Supplier',1,0,'C');
        $this->Ln();
    }
    function viewTable($dbh){
        $this->SetFont('Times','',11);
        $query = $dbh->query("SELECT * FROM tb_supplier");
        foreach ($query as $data) {
            $this->Cell(55,10,$data['kode_supplier'],1,0,'C');
            $this->Cell(55,10,$data['nama_supplier'],1,0,'L');
            $this->Cell(55,10,$data['alamat_supplier'],1,0,'L');
            $this->Cell(55,10,$data['telp_supplier'],1,0,'L');
            $this->Cell(55,10,$data['kota_supplier'],1,0,'L');
            $this->Ln();

        }        
    }
}

$pdf= new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4',0);
$pdf->headerTable();
$pdf->viewTable($dbh);
$pdf->Output();
?>