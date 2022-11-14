<?php
$dbh=new PDO("mysql:host=localhost;dbname=db_ukk_insapra","root","");
if(isset($_POST['cari'])){
        $pencarian="%".$_POST['kata']."%";
        try{
            $cari=$dbh->prepare("select * from tb_supplier where kode_supplier like :nama");
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
    <a href="?hal=Supplier&aksi=tambah" class="tambah"><i class="fa  fa-plus-circle"></i>&nbsp;&nbsp;Tambah</a>

    <div class="dropdown">
        <button><i class="fa fa-print"></i>&nbsp;&nbsp;Print Data</button>
    <div>
        <a href="laporan/Supplier/laporan_print.php" onclick="print_d()"><i class="fa fa-file-text-o"></i>&nbsp;&nbsp;PRINT</a>
        <a href="laporan/Supplier/laporan_pdf.php"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;PDF</a>
        <a href="laporan/Supplier/laporan_excel.php"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;EXCEL</a>
    </div>
    </div>
    
    <form method="POST" class="cari" action="?hal=Supplier&aksi=cari">
        <input type="text" placeholder="Cari Kode Supplier" name="kata">
        <button type="submit" name="cari"><i class="fa fa-search" class="cari"></i></button>
    </form>
</div>
<div class="box">   
<table class="table" border="1" align="center">
        <tr>
            <th>Kode Supplier</th>
            <th>Nama Supplier</th>
            <th>Alamat Supplier</th>
            <th>Telepon</th>
            <th>Kota Supplier</th>
            <th>Aksi</th>
        </tr>
        <tr>
            <td><?php echo $t['kode_supplier']?></td>
            <td><?php echo $t['nama_supplier']?></td>
            <td><?php echo $t['alamat_supplier']?></td>
            <td><?php echo $t['telp_supplier']?></td>
            <td><?php echo $t['kota_supplier']?></td>
            <td>
                <button><a href="?hal=Supplier&aksi=ubah&kode_supplier=<?php echo $t['kode_supplier']?>"
                    onclick="return confirm('Apakah Anda Ingin Ubah Data ini')"><i class="fa fa-pencil"></i></button></a>
                    -
                <button><a href="?hal=Supplier&aksi=hapus&kode_supplier=<?php echo $t['kode_supplier']?>"
                    onclick="return confirm('Apakah Anda Ingin Menghapus Data ini')"><i class="fa  fa-trash"></i></button></a>
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