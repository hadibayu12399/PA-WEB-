<?php
require "../fpdf/fpdf.php";

$dbh = new PDO ('mysql:host=localhost;dbname=db_ukk_insapra', "root", "");

class myPDF extends FPDF{
    function header(){
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(276,5,'APLIKASI INVESTARIS SARANA DAN PRASANA(INSAPRA)', 0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(276,10,'DATA BARANG',0,0,'C');
        $this->Ln(20);
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0, 'C');
    }
    function headerTable(){
        $this->SetFont('Times', 'B' , 11);
        $this->Cell(30,10,'Kode Barang',1,0,'C');
        $this->Cell(40,10,'Nama Barang',1,0,'C');
        $this->Cell(40,10,'Spesifikasi',1,0,'C');
        $this->Cell(30,10,'Lokasi Barang',1,0,'C');
        $this->Cell(30,10,'Kategori',1,0,'C');
        $this->Cell(20,10,'Jumlah',1,0,'C');
        $this->Cell(20,10,'Kondisi',1,0,'C');
        $this->Cell(30,10,'Jenis Barang',1,0,'C');
        $this->Cell(35,10,'Sumber Dana',1,0,'C');
        $this->Ln();
    }
    function viewTable($dbh){
        $this->SetFont('Times','',11);
        $query = $dbh->query("SELECT * FROM tb_barang");
        foreach ($query as $data) {
            $this->Cell(30,10,$data['kode_barang'],1,0,'C');
            $this->Cell(40,10,$data['nama_barang'],1,0,'L');
            $this->Cell(40,10,$data['spesifikasi'],1,0,'L');
            $this->Cell(30,10,$data['lokasi_barang'],1,0,'L');
            $this->Cell(30,10,$data['kategori'],1,0,'L');
            $this->Cell(20,10,$data['jml_barang'],1,0,'L');
            $this->Cell(20,10,$data['kondisi'],1,0,'L');
            $this->Cell(30,10,$data['jenis_barang'],1,0,'L');
            $this->Cell(35,10,$data['sumber_dana'],1,0,'L');
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