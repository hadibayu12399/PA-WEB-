<?php
require "../fpdf/fpdf.php";

$dbh = new PDO ('mysql:host=localhost;dbname=db_ukk_insapra', "root", "");

class myPDF extends FPDF{
    function header(){
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(276,5,'APLIKASI INVESTARIS SARANA DAN PRASANA(INSAPRA)', 0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(276,10,'DATA PINJAM BARANG',0,0,'C');
        $this->Ln(20);
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0, 'C');
    }
    function headerTable(){
        $this->SetFont('Times', 'B' , 11);
        $this->Cell(40 ,10,'No Pinjam',1,0,'C');
        $this->Cell(40,10,'Tanggal Pinjam',1,0,'C');
        $this->Cell(45,10,'Barang',1,0,'C');
        $this->Cell(30,10,'Jumlah Pinjam',1,0,'C');
        $this->Cell(40,10,'Peminjam',1,0,'C');
        $this->Cell(40,10,'Tanggal Kembali',1,0,'C');
        $this->Cell(45,10,'Keterangan',1,0,'C');
        $this->Ln();
    }
    function viewTable($dbh){
        $this->SetFont('Times','',11);
        $query = $dbh->query("SELECT * FROM tb_pinjam_barang a JOIN tb_barang b ON a.kode_barang = b.kode_barang");
        foreach ($query as $data) {
            $this->Cell(40,10,$data['no_pinjam'],1,0,'C');
            $this->Cell(40,10,$data['tgl_pinjam'],1,0,'L');
            $this->Cell(45,10,$data['kode_barang'].' | '.$data['nama_barang'],1,0,'L');
            $this->Cell(30,10,$data['jml_pinjam'],1,0,'L');
            $this->Cell(40,10,$data['peminjam'],1,0,'L');
            $this->Cell(40,10,$data['tgl_kembali'],1,0,'L');
            $this->Cell(45,10,$data['keterangan'],1,0,'L');
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