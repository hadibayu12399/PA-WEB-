<?php
$dbh=new PDO("mysql:host=localhost;dbname=db_ukk_insapra","root","");
if(isset($_POST['cari'])){
        $pencarian="%".$_POST['kata']."%";
        try{
            $cari=$dbh->prepare("select * from tb_barang where kode_barang like :nama");
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
    <a href="?hal=Barang&aksi=tambah" class="tambah"><i class="fa  fa-plus-circle"></i>&nbsp;&nbsp;Tambah</a>

    <div class="dropdown">
        <button><i class="fa fa-print"></i>&nbsp;&nbsp;Print Data</button>
    <div>
        <a href="laporan/Barang/laporan_print.php" onclick="print_d()"><i class="fa fa-file-text-o"></i>&nbsp;&nbsp;PRINT</a>
        <a href="laporan/Barang/laporan_pdf.php"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;PDF</a>
        <a href="laporan/Barang/laporan_excel.php"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;EXCEL</a>
    </div>
    </div>
    
    <form method="POST" class="cari" action="?hal=Barang&aksi=cari">
        <input type="text" placeholder="Cari Nama Barang" name="kata">
        <button type="submit" name="cari"><i class="fa fa-search" class="cari"></i></button>
    </form>
</div>

<div class="box">   
    <table class="table" border="1" align="center">
        <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Spesifikasi</th>
            <th>Lokasi Barang</th>
            <th>Kategori</th>
            <th>Jumlah Barang</th>
            <th>Kondisi</th>
            <th>Jenis Barang</th>
            <th>Sumber Dana</th>
            <th>Aksi</th>
        </tr>
        <tr>
            <td><?php echo $t['kode_barang']?></td>
            <td><?php echo $t['nama_barang']?></td>
            <td><?php echo $t['spesifikasi']?></td>
            <td><?php echo $t['lokasi_barang']?></td>
            <td><?php echo $t['kategori']?></td>
            <td><?php echo $t['jml_barang']?></td>
            <td><?php echo $t['kondisi']?></td>
            <td><?php echo $t['jenis_barang']?></td>
            <td><?php echo $t['sumber_dana']?></td>
            <td>
                <button><a href="?hal=Barang&aksi=ubah&kode_barang=<?php echo $t['kode_barang']?>"
                    onclick="return confirm('Apakah Anda Ingin MengUbah Data ini')"><i class="fa fa-pencil"></i></button></a>
                -
                <button><a href="?hal=Barang&aksi=hapus&kode_barang=<?php echo $t['kode_barang']?>"
                    onclick="return confirm('Apakah Anda Ingin MengHapus Data ini')"><i class="fa fa-trash"></i></button></a>
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