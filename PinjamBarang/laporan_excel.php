<?php

// nama file

$namaFile = "LAPORAN PINJAM BARANG.xls";

// Function penanda awal file (Begin Of File) Excel

function xlsBOF() {
echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
return;
}

// Function penanda akhir file (End Of File) Excel

function xlsEOF() {
echo pack("ss", 0x0A, 0x00);
return;
}

// Function untuk menulis data (angka) ke cell excel

function xlsWriteNumber($Row, $Col, $Value) {
echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
echo pack("d", $Value);
return;
}

// Function untuk menulis data (text) ke cell excel

function xlsWriteLabel($Row, $Col, $Value ) {
$L = strlen($Value);
echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
echo $Value;
return;
}

// header file excel

header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");

// header untuk nama file
header("Content-Disposition: attachment; filename=".$namaFile."");

header("Content-Transfer-Encoding: binary ");

// memanggil function penanda awal file excel
xlsBOF();

// ------ membuat kolom pada excel --- //

// mengisi pada cell A1 (baris ke-0, kolom ke-0)
xlsWriteLabel(0,0,"NO");               

// mengisi pada cell A2 (baris ke-0, kolom ke-1)
xlsWriteLabel(0,1,"No Pinjam");              

// mengisi pada cell A3 (baris ke-0, kolom ke-2)
xlsWriteLabel(0,2,"Tanggal Pinjam");

// mengisi pada cell A4 (baris ke-0, kolom ke-3) 
xlsWriteLabel(0,3,"Barang");

xlsWriteLabel(0,4,"Jumlah"); 

xlsWriteLabel(0,5,"Peminjam");

xlsWriteLabel(0,6,"Tanggal Kembali");

xlsWriteLabel(0,7,"Keterangan");






// mengisi pada cell A5 (baris ke-0, kolom ke-3)
 

// -------- menampilkan data --------- //

// koneksi ke mysql


// query menampilkan semua data

include "../../koneksi.php";
$query= "SELECT * FROM tb_pinjam_barang a JOIN tb_barang b ON a.kode_barang = b.kode_barang";
$hasil=$dbh->query($query);



// nilai awal untuk baris cell
$noBarisCell = 1;

// nilai awal untuk nomor urut data
$noData = 1;

foreach($hasil as $data){
  
   // menampilkan no. urut data
   xlsWriteNumber($noBarisCell,0,$noData);

   // menampilkan data nim
   xlsWriteLabel($noBarisCell,1,$data['no_pinjam']);

   // menampilkan data nama mahasiswa
   xlsWriteLabel($noBarisCell,2,$data['tgl_pinjam']);

   // menampilkan data nilai
   xlsWriteLabel($noBarisCell,3,$data['kode_barang'].' | '.$data['nama_barang']);

   xlsWriteLabel($noBarisCell,4,$data['jml_pinjam']);

   xlsWriteLabel($noBarisCell,5,$data['peminjam']);

   xlsWriteLabel($noBarisCell,6,$data['tgl_kembali']);

   xlsWriteLabel($noBarisCell,7,$data['keterangan']);

      // menampilkan data nilai

   // menampilkan data nilai

   
   // menampilkan status kelulusan
   

   // increment untuk no. baris cell dan no. urut data
   $noBarisCell++;
   $noData++;
}

// memanggil function penanda akhir file excel
xlsEOF();
exit();

?>