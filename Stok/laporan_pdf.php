<?php
require "../fpdf/fpdf.php";

$dbh = new PDO ('mysql:host=localhost;dbname=db_ukk_insapra', "root", "");

class myPDF extends FPDF{
    function header(){
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(276,5,'APLIKASI INVESTARIS SARANA DAN PRASANA(INSAPRA)', 0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(276,10,'DATA STOK',0,0,'C');
        $this->Ln(20);
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0, 'C');
    }
    function headerTable(){
        $this->SetFont('Times', 'B' , 11);
        $this->Cell(70,10,'Barang',1,0,'C');
        $this->Cell(47,10,'Jumlah Barang Masuk',1,0,'C');
        $this->Cell(47,10,'Jumlah Barang Keluar',1,0,'C');
        $this->Cell(47,10,'Total Barang Tersedia',1,0,'C');
        $this->Cell(70,10,'Keterangan',1,0,'C');
        $this->Ln();
    }
    function viewTable($dbh){
        $this->SetFont('Times','',11);
        $query = $dbh->query("SELECT * FROM v_stok");
        foreach ($query as $data) {
            $this->Cell(70,10,$data['kode_barang']. ' | '.$data['nama_barang'] ,1,0,'C');
            $this->Cell(47,10,$data['jml_masuk'],1,0,'L');
            $this->Cell(47,10,$data['jml_barang_keluar'],1,0,'L');
            $this->Cell(47,10,$data['jml_total'],1,0,'L');
            $this->Cell(70,10,$data['keterangan'],1,0,'L');
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