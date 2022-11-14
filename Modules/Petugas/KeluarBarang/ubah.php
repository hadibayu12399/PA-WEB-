<?php
	include "koneksi.php";
		if (isset($_GET[id_brg_keluar])) {
			$query=$dbh->query("SELECT * FROM tb_keluar_barang WHERE id_brg_keluar='$_GET[id_brg_keluar]'");
			$data=$query->fetch(PDO::FETCH_ASSOC);
		}
?>
<div class="form-name">
	<p>Beranda / Keluar Barang / Ubah Data</p>
</div>
<div class="box-tambah">
	<form method="POST">
		<table border="0">
		<tr>
			<td>ID Keluar Barang</td>
			<td>
				<input type="text" class="kode" name="id_brg_keluar" value="<?php echo $data['id_brg_keluar'] ?>" readonly required>
			</td>
		</tr>
		<tr>
			<td>Tanggal Keluar</td>
			<td>
				<input type="date" name="tgl_keluar" value="<?php echo $data['tgl_keluar']?>">
			</td>
		</tr>
		<tr>
			<td>Penerima</td>
			<td>
				<input type="text" name="penerima" value="<?php echo $data['penerima']?>">
			</td>
		</tr>
		<tr>
			<td>Jumlah Barang Keluar</td>
			<td>
				<input type="text" name="jml_brg_keluar" value="<?php echo $data['jml_brg_keluar']?>">
			</td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td>
				<textarea name="keperluan" cols="30" rows="5" placeholder="Keterangan"><?php echo $data['keperluan']?></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<button type="submit" name="update"><i class="fa fa-check-circle"></i>&nbsp; Simpan Data</button>
				<a href="?hal=KeluarBarang" class="kembali"><i class="fa fa-arrow-circle-left"></i>&nbsp;Kembali</a>
			</td>
		</tr>
	</table>
	</form>
</div>
<?php

$id_brg_keluar=$_POST['id_brg_keluar'];
$tgl_keluar = $_POST['tgl_keluar'];
$penerima=$_POST['penerima'];
$jml_brg_keluar=$_POST['jml_brg_keluar'];
$keperluan = $_POST['keperluan'];

	if (isset($_POST['update'])) {
		$myqry="UPDATE tb_keluar_barang SET tgl_keluar='$tgl_keluar',
											penerima='$penerima',
											jml_brg_keluar='$jml_brg_keluar',
											keperluan='$keperluan'
											WHERE id_brg_keluar='$_GET[id_brg_keluar]'";

		$dbh->exec($myqry);

		if ($myqry)
			echo "<span class=berhasil>Data Keluar Barang Barang Berhasil Di Ubah,<a href=?hal=KeluarBarang>Lihat Data</a></span>";
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