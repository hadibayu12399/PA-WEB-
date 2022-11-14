<?php
include 'koneksi.php';
	if (isset($_GET['kode_barang'])) {
		$query=$dbh->query("SELECT * FROM v_stok WHERE kode_barang='$_GET[kode_barang]'");
		$data=$query->fetch(PDO::FETCH_ASSOC);
	}
?>
<div class="form-name">
	<p>Beranda / Stok / Ubah Data</p>
</div>
<div class="box-tambah">
	<form method="POST">
		<table border="0">
		<tr>
			<td>Barang</td>
			<td>
				<input type="text" class="kode" name="kode_barang" value="<?php echo $data['kode_barang'].' | '.$data['nama_barang']?>">
			</td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td>
				<textarea name="keterangan" cols="30" rows="5"><?php echo $data['keterangan']?></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<button type="submit" name="update"><i class="fa fa-check-circle"></i>&nbsp; Simpan Data</button>
				<a href="?hal=Stok" class="kembali"><i class="fa fa-arrow-circle-left"></i>&nbsp;Kembali</a>
			</td>
		</tr>
	</table>
	</form>
</div>

<?php
$keterangan=$_POST['keterangan'];

	if (isset($_POST['update'])) {
		$myqry="UPDATE tb_stok SET keterangan='$keterangan'
									WHERE kode_barang='$_GET[kode_barang]'";
		$dbh->exec($myqry);
	if($myqry)
		 echo "<span class=berhasil>Data Stok Berhasil Di Ubah,<a href=?hal=Stok>Lihat Data</a></span>";
	}
?>



<style>

.box-tambah{
 	width: 1106px;
 	background-color: #fff;
 	position: absolute;
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
select{
	width: 533px;
	padding: 10px 15px;
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