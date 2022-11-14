		<?php
include "koneksi.php";
	
	$tampil = "SELECT max(kode_supplier) as maxKode FROM tb_supplier";
	$query = $dbh->query($tampil);
	foreach($query as $data){
		$kode = $data['maxKode'];
		$noUrut = (int) substr($kode, 3,3);
		@$noUrut++;
		$char = "SP";
		$kos = $char . sprintf("%03s", $noUrut);
	}

 $kode_supplier = $_POST['kode_supplier'];
 $nama_supplier = $_POST['nama_supplier'];
 $alamat_supplier = $_POST['alamat_supplier'];
 $telp_supplier= $_POST['telp_supplier'];
 $kota_supplier=$_POST['kota_supplier'];

 if(isset($_POST['simpan'])){
 	$query = "INSERT INTO tb_supplier VALUES ('$kode_supplier' , '$nama_supplier',' $alamat_supplier',
 	'$telp_supplier','$kota_supplier')";
 	$dbh->exec($query);

 if ($query)
 	 echo "<span class=berhasil>Data Barang Berhasil Di Tambah,<a href=?hal=Supplier>Lihat Data</a></span>";
 }
?>

<div class="form-name">
	<p>Beranda / Supplier / Tambah Data</p>
</div>
<div class="box-tambah">
	<form method="POST">
		<table border="0">
		<tr>
			<td>Kode Supplier</td>
			<td>
				<input type="text" class="kode" name="kode_supplier" value="<?php echo $kos; ?>" readonly required>
			</td>
		</tr>
		<tr>
			<td>Nama Supplier</td>
			<td>
				<input type="text" name="nama_supplier" placeholder="Nama Supplier">
			</td>
		</tr>
		<tr>
			<td>Alamat Supplier</td>
			<td>
				<textarea name="alamat_supplier" cols="30" rows="5" placeholder="Alamat Supplier" required placeholder="Alamat Supplier"></textarea>
			</td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td>
				<input type="text" name="telp_supplier" placeholder="Telepon">
			</td>
		</tr>
		<tr>
			<td>Kota Supplier</td>
			<td>
				<input type="text" name="kota_supplier" placeholder="Kota Supplier">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<button type="submit" name="simpan"><i class="fa fa-check-circle"></i>&nbsp; Simpan Data</button>
				<a href="?hal=Supplier" class="kembali"><i class="fa fa-arrow-circle-left"></i>&nbsp;Kembali</a>
			</td>
		</tr>
	</table>
	</form>
</div>

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