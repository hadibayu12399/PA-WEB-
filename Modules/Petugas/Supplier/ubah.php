<?php
include "koneksi.php";
	if (isset($_GET['kode_supplier'])) {
		$query=$dbh->query("SELECT * FROM tb_supplier WHERE kode_supplier='$_GET[kode_supplier]'");
		$data=$query->fetch(PDO::FETCH_ASSOC);
	}
?>
<div class="form-name">
	<p>Beranda / Supplier / Ubah Data</p>
</div>
<div class="box-tambah">
	<form method="POST">
		<table border="0">
		<tr>
			<td>Kode Supplier</td>
			<td>
				<input type="text" class="kode" name="kode_supplier" value="<?php echo $data['kode_supplier']?>" readonly required>
			</td>
		</tr>
		<tr>
			<td>Nama Supplier</td>
			<td>
				<input type="text" name="nama_supplier" value="<?php echo $data['nama_supplier']?>">
			</td>
		</tr>
		<tr>
			<td>Alamat Supplier</td>
			<td>
				<textarea name="alamat_supplier" cols="30" rows="5"  required><?php echo $data['alamat_supplier']?></textarea>
			</td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td>
				<input type="text" name="telp_supplier" value="<?php echo $data['telp_supplier']?>">
			</td>
		</tr>
		<tr>
			<td>Kota Supplier</td>
			<td>
				<input type="text" name="kota_supplier" value="<?php echo $data['kota_supplier']?>">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<button type="submit" name="update"><i class="fa fa-check-circle"></i>&nbsp; Simpan Data</button>
				<a href="?hal=Supplier" class="kembali"><i class="fa fa-arrow-circle-left"></i>&nbsp;Kembali</a>
			</td>
		</tr>
	</table>
	</form>
</div>
<?php
$kode_supplier = $_POST['kode_supplier'];
$nama_supplier = $_POST['nama_supplier'];
$alamat_supplier = $_POST['alamat_supplier'];
$telp_supplier= $_POST['telp_supplier'];
$kota_supplier=$_POST['kota_supplier'];

if (isset($_POST['update'])) {
	$myqry="UPDATE tb_supplier SET nama_supplier='$nama_supplier',
								   alamat_supplier='$alamat_supplier',
									telp_supplier='$telp_supplier',
									kota_supplier='$kota_supplier'
									WHERE kode_supplier='$_GET[kode_supplier]'";
	$dbh->exec($myqry);

	if ($myqry)
		 echo "<span class=berhasil>Data Barang Berhasil Di Ubah,<a href=?hal=Supplier>Lihat Data</a></span>";
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
.kembali{
	background: #f9924d;
	color: #fff;
	border-radius: 2px;
	cursor: pointer;
	border: 1px solid #f9924d;
	padding: 9px 20px;
	text-decoration: none;
}
.berhasil{
		background: #5cb85c;
    	border: 1px solid #449d44;
    	padding: 10px 20px;
    	color: #fff;
    	font-weight: bold;
    	margin-top: 45px;
    	position: absolute;
    	margin-left: 581px;
    	font-size: 12px;
    	border-radius: 2px;
	}
.kembali:hover{
	background: #ea813a;
}
.kode{
	background: #eeeeee;
}
</style>