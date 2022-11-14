<?php
include "koneksi.php";
	$tampil = "SELECT max(id_brg_keluar) as maxKode FROM tb_keluar_barang";
	$query =$dbh->query($tampil);
		foreach ($query as $data) {
			$kode = $data['maxKode'];
				$noUrut = (int) substr($kode, 3,3);
				@$noUrut++;
				$char = "BKB";
				$kos = $char . sprintf("%03s", $noUrut);
			
		}

$id_brg_keluar=$_POST['id_brg_keluar'];
$kode_barang=$_POST['kode_barang'];
$nama_barang=$_POST['nama_barang'];
$tgl_keluar = $_POST['tgl_keluar'];
$penerima=$_POST['penerima'];
$jml_brg_keluar=$_POST['jml_brg_keluar'];
$keperluan = $_POST['keperluan'];

	if (isset($_POST['simpan'])) {
		$query = "INSERT INTO tb_keluar_barang Values('$id_brg_keluar', '$kode_barang', '$nama_barang', '$tgl_keluar','$penerima','$jml_brg_keluar','$keperluan')";

		$dbh->exec($query);

	if($query)
		 echo "<span class=berhasil>Data Keluar Barang Berhasil Di Tambah,<a href=?hal=KeluarBarang>Lihat Data</a></span>";
	}

?>
<div class="form-name">
	<p>Beranda / Keluar Barang / Tambah Data</p>
</div>
<div class="box-tambah">
	<form method="POST">
		<table border="0">
		<tr>
			<td>ID Keluar Barang</td>
			<td>
				<input type="text" class="kode" name="id_brg_keluar" value="<?php echo $kos; ?>" readonly required>
			</td>
		</tr>
		<tr>
			<td>Barang</td>
			<td>
				<select name="kode_barang">
					<option value="">* Pilih Kode Barang *</option>
					<?php
						$tampil = "SELECT * FROM tb_barang";
						$query = $dbh->query($tampil);
						foreach($query as $data){
					?>
					<option value="<?php echo $data['kode_barang'];?>"><?php echo $data['kode_barang'];?> | <?php echo $data['nama_barang'];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tanggal Keluar</td>
			<td>
				<input type="date" name="tgl_keluar">
			</td>
		</tr>
		<tr>
			<td>Penerima</td>
			<td>
				<input type="text" name="penerima" placeholder="Penerima">
			</td>
		</tr>
		<tr>
			<td>Jumlah Barang Keluar</td>
			<td>
				<input type="text" name="jml_brg_keluar" placeholder="Jumlah Barang Keluar">
			</td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td>
				<textarea name="keperluan" cols="30" rows="5" placeholder="Keterangan" required></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<button type="submit" name="simpan"><i class="fa fa-check-circle"></i>&nbsp; Simpan Data</button>
				<a href="?hal=KeluarBarang" class="kembali"><i class="fa fa-arrow-circle-left"></i>&nbsp;Kembali</a>
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
select{
	width: 533px;
	padding: 10px 15px;
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