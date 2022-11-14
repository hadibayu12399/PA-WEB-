<?php
require "../fpdf/fpdf.php";

$dbh = new PDO ('mysql:host=localhost;dbname=db_ukk_insapra', "root", "");

class myPDF extends FPDF{
    function header(){
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(276,5,'APLIKASI INVESTARIS SARANA DAN PRASANA(INSAPRA)', 0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(276,10,'DATA KELUAR BARANG',0,0,'C');
        $this->Ln(20);
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0, 'C');
    }
    function headerTable(){
        $this->SetFont('Times', 'B' , 11);
        $this->Cell(45,10,'ID Barang Keluar',1,0,'C');
        $this->Cell(45,10,'Barang',1,0,'C');
        $this->Cell(45,10,'Tanggal Keluar',1,0,'C');
        $this->Cell(45,10,'Penerima',1,0,'C');
        $this->Cell(45,10,'Jumlah',1,0,'C');
        $this->Cell(45,10,'Keperluan',1,0,'C');
        $this->Ln();
    }
    function viewTable($dbh){
        $this->SetFont('Times','',11);
        $query = $dbh->query("SELECT * FROM tb_keluar_barang a JOIN tb_barang b ON a.kode_barang = b.kode_barang");
        foreach ($query as $data) {
            $this->Cell(45,10,$data['id_brg_keluar'],1,0,'C');
            $this->Cell(45,10,$data['kode_barang'].' | ' .$data['nama_barang'],1,0,'L');
            $this->Cell(45,10,$data['tgl_keluar'],1,0,'L');
            $this->Cell(45,10,$data['penerima'],1,0,'L');
            $this->Cell(45,10,$data['jml_brg_keluar'],1,0,'L');
            $this->Cell(45,10,$data['keperluan'],1,0,'L');
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