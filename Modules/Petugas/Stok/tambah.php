<?php
include "koneksi.php";
	
	$tampil = "SELECT max(kode_barang) as maxKode FROM tb_stok";
	$query = $dbh->query($tampil);
	foreach($query as $data){
		$kode = $data['maxKode'];
		$noUrut = (int) substr($kode, 3,3);
		@$noUrut++;
		$char = "ST";
		$kos = $char . sprintf("%03s", $noUrut);
	}

 $kode_barang = $_POST['kode_barang'];
 $keterangan=$_POST['keterangan'];


 if(isset($_POST['simpan'])){
 	$query = "INSERT INTO tb_stok VALUES ('$kode_barang','$keterangan')";
 	$dbh->exec($query);

 if ($query)
 		 echo "<span class=berhasil>Data Stok Berhasil Di Tambah,<a href=?hal=Stok>Lihat Data</a></span>";

 }
?>
<!-- <?php
include "koneksi.php";

if (isset($_POST['find'])) {
	
	$kode_barang = $_POST['kode_barang'];

	$pdoquery = "SELECT * FROM tb_barang WHERE kode_barang = :kode_barang";

	$pdoResult = $dbh->prepare($pdoquery);

	$pdoExec = $pdoResult->execute(array(":kode_barang"=>$kode_barang));

	if($pdoExec)
	{
		if($pdoResult->rowCount()>0)
		{
			foreach($pdoResult as $row)
			{
				$kode_barang = $row['kode_barang'];
				$nama_barang = $row['nama_barang'];
			}
		}
	}else{
		echo 'Data Tidak Ditemukan';
	}
}
?> -->

<div class="form-name">
	<p>Beranda / Stok / Tambah Data</p>
</div>
<div class="box-tambah">
	<form method="POST">
		<table border="0">
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
			<td>Keterangan</td>
			<td>
				<textarea name="keterangan" cols="30" rows="5" placeholder="Keterangan"></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<button type="submit" name="simpan"><i class="fa fa-check-circle"></i>&nbsp; Simpan Data</button>
				<a href="?hal=Stok" class="kembali"><i class="fa fa-arrow-circle-left"></i>&nbsp;Kembali</a>
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