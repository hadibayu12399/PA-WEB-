<?php
include "koneksi.php";
	if (isset($_GET['no_pinjam'])) {
		$query=$dbh->query("SELECT * FROM tb_pinjam_barang WHERE no_pinjam='$_GET[no_pinjam]'");
		$data=$query->fetch(PDO::FETCH_ASSOC);
	}

	if (isset($_GET['no_pinjam'])) {
		$query=$dbh->query("SELECT * FROM tb_pinjam_barang a JOIN tb_barang b ON a.kode_barang = b.kode_barang");
		$data=$query->fetch(PDO::FETCH_ASSOC);
	}

?>
<div class="form-name">
	<p>Beranda / Pinjam Barang / Ubah Data</p>
</div>
<div class="box-tambah">
	<form method="POST">
		<table border="0">
		<tr>
			<td>No Pinjam</td>
			<td>
				<input type="text" class="kode" name="no_pinjam" value="<?php echo $data['no_pinjam']?>" readonly required>
			</td>
		</tr>
		<tr>
			<td>Barang</td>
			<td>
				<input type="text" class="kode" name="kode_barang" value="<?php echo $data['kode_barang'].' | '.$data['nama_barang']?>">
			</td>
		</tr>
		<tr>
			<td>Tanggal Pinjam</td>
			<td>
				<input type="date" name="tgl_pinjam" value="<?php echo $data['tgl_pinjam']?>">
			</td>
		</tr>
		<tr>
			<td>Jumlah Pinjam</td>
			<td>
				<input type="text" name="jml_pinjam" value="<?php echo $data['jml_pinjam']?>">
			</td>
		</tr>
		<tr>
			<td>Peminjam</td>
			<td>
				<input type="text" name="peminjam" value="<?php echo $data['peminjam']?>">
			</td>
		</tr>
		<tr>
			<td>Tanggal Kembali</td>
			<td>
				<input type="date" name="tgl_kembali" value="<?php echo $data['tgl_kembali']?>">
			</td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td>
				<textarea name="keterangan" cols="30" rows="5" placeholder="Keterangan" required><?php echo $data['keterangan']?></textarea>
			</td>
		</tr>
		</tr>
		<tr>
			<td colspan="2">
				<button type="submit" name="update"><i class="fa fa-check-circle"></i>&nbsp; Simpan Data</button>
				<a href="?hal=PinjamBarang" class="kembali"><i class="fa fa-arrow-circle-left"></i>&nbsp;Kembali</a>
			</td>
		</tr>
	</table>
	</form>
</div>

<?php

$no_pinjam = $_POST['no_pinjam'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$jml_pinjam = $_POST['jml_pinjam'];
$peminjam = $_POST['peminjam'];
$tgl_kembali = $_POST['tgl_kembali'];
$keterangan =$_POST['keterangan'];

	if (isset($_POST['update'])) {
		$myqry="UPDATE tb_pinjam_barang SET tgl_pinjam='$tgl_pinjam',
											jml_pinjam='$jml_pinjam',
											peminjam='$peminjam',
											tgl_kembali='$tgl_kembali',
											keterangan='$keterangan'
											WHERE no_pinjam='$_GET[no_pinjam]'";

		$dbh->exec($myqry);
		 echo "<span class=berhasil>Data  Pinjam Barang Berhasil Di Ubah,<a href=?hal=PinjamBarang>Lihat Data</a></span>";
	}


?>
<style>

.box-tambah{
 	width: 1106px;
 	background-color: #fff;
 	position: fixed;
 	margin-left: 242px;
	text-align: center;
	top: 122px;
	color: #25476a;
}
table{
		border-collapse : collapse;
		margin-left: 20px;
		margin-top: 20px;
		font-size: 14px;
	    width: 759px;
	    margin: 2% auto;
}
table td{
		padding: 5px 5px;
}
	
input, select, textarea{
		width: 500px;
		padding: 10px 15px;
		border: 1px solid #ddd;
		outline:none;
		color: #25476a;
		border-radius: 2px;
}
input:focus,textarea:focus{
		border: 1px solid #43c3ef;
		box-shadow: 0 0 5px #43c3ef;
		transition: 0.6s;
}
.form-name{
	background-color: #25476a;
 	position: absolute;
 	color: #fff;
 	margin-left: 242px;
 	width: 81%;
	text-align: center;
	top: 80px; 
}
.form-name p{
	top: 77px;
	margin-left: 1em;
	font-size: 12px;
	font-weight: bold;
	text-align: left;
}
button{
	outline: none;
	border: 1px solid #25476a;
	padding: 10px 20px;
	background: #25476a;
	color: #fff;
	border-radius: 2px;
	cursor: pointer;
	margin-right: 15px;
}
button:hover{
	background: #3a5f86;
}
.berhasil{
		background: #5cb85c;
    	border: 1px solid #449d44;
    	padding: 10px 20px;
    	color: #fff;
    	margin-top: 45px;
    	font-weight: bold;
    	position: absolute;
    	margin-left: 581px;
    	font-size: 12px;
    	border-radius: 2px;
	}
.kembali{
	background: #f9924d;
	color: #fff;
	border-radius: 2px;
	cursor: pointer;
	border: 1px solid #f9924d;
	padding: 9px 20px;
	text-decoration: none;
}
.kembali:hover{
	background: #ea813a;
}
.kode{
	background: #eeeeee;
}
</style>