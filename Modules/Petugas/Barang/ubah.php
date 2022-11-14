<?php
include "koneksi.php";
	if(isset($_GET['kode_barang'])){
		$query=$dbh->query("SELECT * FROM tb_barang WHERE kode_barang='$_GET[kode_barang]'");
		$data=$query->fetch(PDO::FETCH_ASSOC);
	 } 
?>
<div class="form-name">
	<p>Beranda / Barang / Ubah Data</p>
</div>
<div class="box-tambah">
	<form method="POST">
		<table border="0">
		<tr>
			<td>Kode Barang</td>
			<td>
				<input type="text" class="kode" name="kode_barang" value="<?php echo $data['kode_barang']?>" readonly required>
			</td>
		</tr>
		<tr>
			<td>Nama Barang</td>
			<td>
				<input type="text" name="nama_barang" value="<?php echo $data['nama_barang']?>">
			</td>
		</tr>
		<tr>
			<td>Spesifikasi</td>
			<td>
				<input type="text" name="spesifikasi" value="<?php echo $data['spesifikasi']?>">
			</td>
		</tr>
		<tr>
			<td>Lokasi Barang</td>
			<td>
				<input type="text" name="lokasi_barang" value="<?php echo $data['lokasi_barang']?>">
			</td>
		</tr>
		<tr>
			<td>Kategori</td>
			<td>
				<select name="kategori">
					<option value="<?php echo $data['kategori']?>"><?php echo $data['kategori']?></option>	
					<option value="Elektronik">Elektronik</option>	
					<option value="Furniture">Furniture</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Kondisi</td>
			<td>
				<select name="kondisi">
					<option value="<?php echo $data['kondisi']?>"><?php echo $data['kondisi']?></option>	
					<option value="Baik">Baik</option>
					<option value="Rusak Ringan">Rusak Ringan</option>
					<option value="Rusak Berat">Rusak Berat</option>	
				</select>
			</td>
		</tr>
		<tr>
			<td>Jenis Barang</td>
			<td>
				<select name="jenis_barang">
					<option value="<?php echo $data['jenis_barang']?>"><?php echo $data['jenis_barang']?></option>	
					<option value="Komputer">Komputer</option>	
					<option value="Monitor">Monitor</option>
					<option value="Printer">Printer</option>
					<option value="Peralatan Pembelajaran">Peralatan Pembelajaran</option>
					<option value="Alat Ukur">Alat Ukur</option>
					<option value="Mebeler">Mebeler</option>	
				</select>
			</td>
		</tr>
		<tr>
			<td>Sumber Dana</td>
			<td>
				<input type="text" name="sumber_dana" value="<?php echo $data['sumber_dana']?>">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<button type="submit" name="update"><i class="fa fa-check-circle"></i>&nbsp; Simpan Data</button>
				<a href="?hal=Barang" class="kembali"><i class="fa fa-arrow-circle-left"></i>&nbsp;Kembali</a>
			</td>
		</tr>
	</table>
	</form>
</div>
<?php
$kode_barang = $_POST['kode_barang'];
$nama_barang = $_POST['nama_barang'];
$spesifikasi = $_POST['spesifikasi'];
$lokasi_barang= $_POST['lokasi_barang'];
$kategori=$_POST['kategori'];
$kondisi = $_POST['kondisi'];
$jenis_barang = $_POST['jenis_barang'];
$sumber_dana = $_POST['sumber_dana'];

if (isset($_POST['update'])) {
	$myqry="UPDATE tb_barang SET nama_barang='$nama_barang',
								 spesifikasi='$spesifikasi',
								 lokasi_barang='$lokasi_barang',
								 kategori='$kategori',
								 kondisi='$kondisi',
								 jenis_barang='$jenis_barang',
								 sumber_dana='$sumber_dana'
								 WHERE kode_barang = '$_GET[kode_barang]'";

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
select{
	width: 533px;
	overflow: scroll;
	padding: 10px 15px;
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