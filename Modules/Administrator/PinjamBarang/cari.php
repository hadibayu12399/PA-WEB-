<?php
$dbh=new PDO("mysql:host=localhost;dbname=db_ukk_insapra","root","");
if(isset($_POST['cari'])){
        $pencarian="%".$_POST['kata']."%";
        try{
            $cari=$dbh->prepare("select * from tb_pinjam_barang a JOIN tb_barang b ON a.kode_barang = b.kode_barang where no_pinjam like :nama");
            $cari->BindParam(":nama",$pencarian, PDO::PARAM_STR);
            $cari->execute();
            if($cari->rowCount()<1){
                echo "<i> Tidak ada hasil untuk pencarian kata <b>\"".$_POST['kata']."\"</i></b>";
            }else{
                while($t=$cari->fetch()){
                ?>
                <div class="page-headerb">
    <p>Beranda / Barang / Tampil Data<p>
</div>
<div class="page-headernav">
    <a href="?hal=PinjamBarang&aksi=tambah" class="tambah"><i class="fa  fa-plus-circle"></i>&nbsp;&nbsp;Tambah</a>

    <div class="dropdown">
        <button><i class="fa fa-print"></i>&nbsp;&nbsp;Print Data</button>
    <div>
        <a href="laporan/PinjamBarang/laporan_print.php" onclick="print_d()"><i class="fa fa-file-text-o"></i>&nbsp;&nbsp;PRINT</a>
        <a href="laporan/PinjamBarang/laporan_pdf.php"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;PDF</a>
        <a href="laporan/PinjamBarang/laporan_excel.php"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;EXCEL</a>
    </div>
    </div>
    
    <form method="POST" class="cari" action="?hal=PinjamBarang&aksi=cari">
        <input type="text" placeholder="Cari ID Masuk Barang" name="kata">
        <button type="submit" name="cari"><i class="fa fa-search" class="cari"></i></button>
    </form>
</div>

<div class="box">   
 <table class="table" border="1" align="center">
        <tr>
            <th>No Pinjam</th>
            <th>Tanggal Pinjam</th>
            <th>Barang</th>
            <th>Jumlah</th>
            <th>Peminjam</th>
            <th>Tanggal Kembali</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
        <tr>
            <td><?php echo $t['no_pinjam']?></td>
            <td><?php echo $t['tgl_pinjam']?></td>
            <td><?php echo $t['kode_barang']. ' | '.$t['nama_barang']?></td>
            <td><?php echo $t['jml_pinjam']?></td>
            <td><?php echo $t['peminjam']?></td>
            <td><?php echo $t['tgl_kembali']?></td>
            <td><?php echo $t['keterangan']?></td>
            <td>
                <button><a href="?hal=PinjamBarang&aksi=ubah&no_pinjam=<?php echo $t['no_pinjam']?>"
                    onclick="return confirm('Apakah Anda Ingin Ubah Data ini')"><i class="fa fa-pencil"></i></button></a>
                    -
                <button><a href="?hal=PinjamBarang&aksi=hapus&no_pinjam=<?php echo $t['no_pinjam']?>"
                    onclick="return confirm('Apakah Anda Ingin Menghapus Data ini')"><i class="fa  fa-trash"></i></button>
            </td>
        </tr>
    </table>
</div>
<?php
                }
            }   
        }catch(PDOException $e){
            echo $e->getMessage();
        }
}
?>
</div>