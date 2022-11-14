<?php
include "koneksi.php";
	
	$tampil = "SELECT max(kode_barang) as maxKode FROM tb_barang";
	$query = $dbh->query($tampil);
	foreach($query as $data){
		$kode = $data['maxKode'];
		$noUrut = (int) substr($kode, 3,3);
		@$noUrut++;
		$char = "BR";
		$kos = $char . sprintf("%03s", $noUrut);
	}

 $kode_barang = $_POST['kode_barang'];
 $nama_barang = $_POST['nama_barang'];
 $spesifikasi = $_POST['spesifikasi'];
 $lokasi_barang= $_POST['lokasi_barang'];
 $kategori=$_POST['kategori'];
 $jml_barang=$_POST['jml_barang'];
 $kondisi = $_POST['kondisi'];
 $jenis_barang = $_POST['jenis_barang'];
 $sumber_dana = $_POST['sumber_dana'];

 if(isset($_POST['simpan'])){
 	$query = "INSERT INTO tb_barang VALUES ('$kode_barang' , '$nama_barang',' $spesifikasi','$lokasi_barang',
 					'$kategori', '$jml_barang', '$kondisi', '$jenis_barang', '$sumber_dana')";
 	$dbh->exec($query);

 if ($query)
 	 echo "<span class=berhasil>Data Barang Berhasil Di Tambah,<a href=?hal=Barang>Lihat Data</a></span>";
 }
?>
<div class="form-name">
	<p>Beranda / Barang / Tambah Data</p>
</div>
<div class="box-tambah">
	<form method="POST">
		<table border="0">
		<tr>
			<td>Kode Barang</td>
			<td>
				<input type="text" class="kode" name="kode_barang" value="<?php echo $kos; ?>" readonly required>
			</td>
		</tr>
		<tr>
			<td>Nama Barang</td>
			<td>
				<input type="text" name="nama_barang" placeholder="Nama Barang">
			</td>
		</tr>
		<tr>
			<td>Spesifikasi</td>
			<td>
				<input type="text" name="spesifikasi" placeholder="Spesifikasi">
			</td>
		</tr>
		<tr>
			<td>Lokasi Barang</td>
			<td>
				<input type="text" name="lokasi_barang" placeholder="Lokasi Barang">
			</td>
		</tr>
		<tr>
			<td>Kategori</td>
			<td>
				<select name="kategori">
					<option value="">-- Pilih Kategori Barang --</option>	
					<option value="Elektronik">Elektronik</option>	
					<option value="Furniture">Furniture</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Kondisi</td>
			<td>
				<select name="kondisi">
					<option value="">-- Pilih Kondisi Barang --</option>	
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
					<option value="">-- Pilih Jenis Barang --</option>	
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
				<input type="text" name="sumber_dana" placeholder="Sumber Dana">
			</td>
 		</tr>
		<tr>
			<td colspan="2">
				<button type="submit" name="simpan"><i class="fa fa-check-circle"></i>&nbsp; Simpan Data</button>
				<a href="?hal=Barang" class="kembali"><i class="fa fa-arrow-circle-left"></i>&nbsp;Kembali</a>
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