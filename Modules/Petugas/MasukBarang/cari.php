<?php
$dbh=new PDO("mysql:host=localhost;dbname=db_ukk_insapra","root","");
if(isset($_POST['cari'])){
        $pencarian="%".$_POST['kata']."%";
        try{
            $cari=$dbh->prepare("select * from tb_masuk a JOIN tb_barang b ON a.kode_barang = b.kode_barang JOIN tb_supplier c ON a.kode_supplier = c.kode_supplier where id_msk_brg like :nama");
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
        <a href="laporan/MasukBarang/laporan_print.php" onclick="print_d()"><i class="fa fa-file-text-o"></i>&nbsp;&nbsp;PRINT</a>
        <a href="laporan/MasukBarang/laporan_pdf.php"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;PDF</a>
        <a href="laporan/MasukBarang/laporan_excel.php"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;EXCEL</a>
    </div>
    </div>
    
    <form method="POST" class="cari" action="?hal=MasukBarang&aksi=cari">
        <input type="text" placeholder="Cari ID Masuk Barang" name="kata">
        <button type="submit" name="cari"><i class="fa fa-search" class="cari"></i></button>
    </form>
</div>

<div class="box">   
  <table class="table" border="1" align="center">
        <tr>
            <th>ID Masuk Barang</th>
            <th>Barang</th>
            <th>Tanggal Masuk</th>
            <th>Jumlah Masuk</th>
            <th>Supplier</th>
            <th>Aksi</th>
        </tr>
        <tr>
            <td><?php echo $t['id_msk_brg']?></td>
            <td><?php echo $t['kode_barang']. ' | ' . $t['nama_barang']?></td>
            <td><?php echo $t['tgl_masuk']?></td>
            <td><?php echo $t['jml_masuk']?></td>
            <td><?php echo $t['kode_supplier'] . ' | ' . $t['nama_supplier']?></td>
            <td>
                <button><a href="?hal=MasukBarang&aksi=ubah&id_msk_brg=<?php echo $t['id_msk_brg']?>"
                    onclick="return confirm('Apakah Anda Ingin Ubah Data ini')"><i class="fa fa-pencil"></i></button></a>
                    -
                <button><a href="?hal=MasukBarang&aksi=hapus&id_msk_brg=<?php echo $t['id_msk_brg']?>"
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