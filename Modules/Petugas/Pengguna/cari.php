<?php
$dbh=new PDO("mysql:host=localhost;dbname=db_ukk_insapra","root","");
if(isset($_POST['cari'])){
        $pencarian="%".$_POST['kata']."%";
        try{
            $cari=$dbh->prepare("select * from user where id_user like :nama");
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
    <a href="?hal=Pengguna&aksi=tambah" class="tambah"><i class="fa  fa-plus-circle"></i>&nbsp;&nbsp;Tambah</a>

    <div class="dropdown">
        <button><i class="fa fa-print"></i>&nbsp;&nbsp;Print Data</button>
    <div>
        <a href="#" onclick="print_d()"><i class="fa fa-file-text-o"></i>&nbsp;&nbsp;PRINT</a>
        <a href="#"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;PDF</a>
        <a href="#"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;EXCEL</a>
    </div>
    </div>
    
    <form method="POST" class="cari" action="?hal=Pengguna&aksi=cari">
        <input type="text" placeholder="Cari ID Pengguna" name="kata">
        <button type="submit" name="cari"><i class="fa fa-search" class="cari"></i></button>
    </form>
</div>

<div class="box">   
<table class="table" border="1" align="center">
        <tr>
            <th>ID Pengguna</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Password</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
       <tr>
            <td><?php echo $t['id_user']?></td>
            <td><?php echo $t['nama']?></td>
            <td><?php echo $t['username']?></td>
            <td><?php echo $t['password']?></td>
            <td><?php echo $t['level']?></td>
            <td>
                <button><a href="?hal=Pengguna&aksi=ubah&id_user=<?php echo $t['id_user']?>"
                    onclick="return confirm('Apakah Anda Ingin Ubah Data ini')"><i class="fa fa-pencil"></i></button></a>
                    -
                <button><a href="?hal=Pengguna&aksi=hapus&id_user=<?php echo $t['id_user']?>"
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