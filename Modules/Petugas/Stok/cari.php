<?php
$dbh=new PDO("mysql:host=localhost;dbname=db_ukk_insapra","root","");
if(isset($_POST['cari'])){
        $pencarian="%".$_POST['kata']."%";
        try{
            $cari=$dbh->prepare("select * from v_stok where kode_barang like :nama");
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

    <div class="dropdown">
        <button><i class="fa fa-print"></i>&nbsp;&nbsp;Cetak Data</button>
    <div>
        <a href="laporan/Stok/laporan_print.php" onclick="print_d()"><i class="fa fa-file-text-o"></i>&nbsp;&nbsp;PRINT</a>
        <a href="laporan/Stok/laporan_pdf.php"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;PDF</a>
        <a href="laporan/Stok/laporan_excel.php"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;EXCEL</a>
    </div>
    </div>
    
    <form method="POST" class="cari" action="?hal=Stok&aksi=cari">
        <input type="text" placeholder="Cari ID Masuk Barang" name="kata">
        <button type="submit" name="cari"><i class="fa fa-search" class="cari"></i></button>
    </form>
</div>
<div class="box">   
<table class="table" border="1" align="center">
        <tr>
            <th>Barang</th>
            <th>Jumlah Barang Masuk</th>
            <th>Jumlah Barang Keluar</th>
            <th>Total Barang Tersedia</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
        <tr>
            <td><?php echo $t['kode_barang']. ' | '.$t['nama_barang'] ?></td>
            <td><?php echo $t['jml_masuk']?></td>
            <td><?php echo $t['jml_barang_keluar']?></td>
            <td><?php echo $t['jml_total']?></td>
            <td><?php echo $t['keterangan']?></td>
            <td>
                <button><a href="?hal=Stok&aksi=ubah&kode_barang=<?php echo $t['kode_barang']?>"
                    onclick="return confirm('Apakah Anda Ingin Ubah Data ini')"><i class="fa fa-pencil"></i></button></a>
                    -
                <button><a href="?hal=Stok&aksi=hapus&kode_barang=<?php echo $t['kode_barang']?>"
                    onclick="return confirm('Apakah Anda Ingin Menghapus Data ini?')"><i class="fa  fa-trash"></i></button></a>
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