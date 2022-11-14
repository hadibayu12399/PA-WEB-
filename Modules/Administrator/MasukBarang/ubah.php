<?php
include "koneksi.php";
	if(isset($_GET[id_msk_brg])) {
		$query=$dbh->query(" SELECT * FROM tb_masuk WHERE id_msk_brg='$_GET[id_msk_brg]'");
		$data=$query->fetch(PDO::FETCH_ASSOC);

	}
	if(isset($_GET[id_msk_brg])) {
		$query=$dbh->query("SELECT * FROM tb_masuk a JOIN tb_barang b ON a.kode_barang = b.kode_barang JOIN tb_supplier c ON a.kode_supplier = c.kode_supplier");
		$data=$query->fetch(PDO::FETCH_ASSOC);
	}
?>

<div class="form-name">
	<p>Beranda / Masuk Barang / Ubah Data</p>
</div>
<div class="box-tambah">
	<form method="POST">
		<table border="0">
		<tr>
			<td>ID Masuk Barang</td>
			<td>
				<input type="text" class="kode" name="id_msk_brg" value="<?php echo $data['id_msk_brg']?>" readonly required>
			</td>
		</tr>
		<tr>
			<td>Barang</td>
			<td>
				<input type="text" class="kode" name="kode_barang" value="<?php echo $data['kode_barang'].' | '.$data['nama_barang']?>">
			</td>
		</tr>
		<tr>
			<td>Tanggal Masuk</td>
			<td>
				<input type="date" name="tgl_masuk" value="<?php echo $data['tgl_masuk']?>">
			</td>
		</tr>
		<tr>
			<td>Jumlah Masuk</td>
			<td>
				<input type="text" name="jml_masuk" value="<?php echo $data['jml_masuk']?>">
			</td>
		</tr>
		<tr>
			<td>Kode Supplier</td>
			<td>
				<input type="text" class="kode" name="kode_supplier" value="<?php echo $data ['kode_supplier']. ' | '.$data['nama_supplier']?>">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<button type="submit" name="update"><i class="fa fa-check-circle"></i>&nbsp; Simpan Data</button>
				<a href="?hal=MasukBarang" class="kembali"><i class="fa fa-arrow-circle-left"></i>&nbsp;Kembali</a>
			</td>
		</tr>
	</table>
	</form>
</div>

<?php
$id_msk_brg = $_POST['id_msk_brg'];
$tgl_masuk = $_POST['tgl_masuk'];
$jml_masuk = $_POST['jml_masuk'];
$kode_supplier = $_POST['kode_supplier'];

	if (isset($_POST['update'])) {
		 $myqry="UPDATE tb_masuk SET tgl_masuk = '$tgl_masuk',
		 							 jml_masuk = '$jml_masuk',
		 							 kode_supplier = '$kode_supplier'
		 							 WHERE id_msk_brg='$_GET[id_msk_brg]'";

		$dbh->exec($myqry);
			echo "<span class=berhasil>Data Barang Berhasil Di Ubah,<a href=?hal=Barang>Lihat Data</a></span>";
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