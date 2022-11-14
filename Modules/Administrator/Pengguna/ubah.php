<?php
include "koneksi.php";
	if (isset($_GET[id_user])) {
		$query = $dbh->query("SELECT * FROM user WHERE id_user = '$_GET[id_user]'");
		$data = $query->fetch(PDO::FETCH_ASSOC);
	}
?>
<div class="form-name">
	<p>Beranda / Pengguna / Tambah Data</p>
</div>
<div class="box-tambah">
	<form method="POST">
		<table border="0">
		<tr>
			<td>ID Pengguna</td>
			<td>
				<input type="text" class="kode" name="id_user" value="<?php echo $data['id_user']?>" Readonly>
			</td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>
				<input type="text" name="nama" value="<?php echo $data['nama']?>">
			</td>
		</tr>
		<tr>
			<td>Username</td>
			<td>
				<input type="text" name="username" value="<?php echo $data['username']?>">
			</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>
				<input type="text" name="password" value="<?php echo $data['password']?>">
			</td>
		</tr>
		<tr>
			<td>Status</td>
			<td>
				<input type="text" name="level" value="<?php echo $data['level']?>">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<button type="submit" name="update"><i class="fa fa-check-circle"></i>&nbsp; Simpan Data</button>
				<a href="?hal=Pengguna" class="kembali"><i class="fa fa-arrow-circle-left"></i>&nbsp;Kembali</a>
			</td>
		</tr>
	</table>
	</form>
</div>
<?php

 $id_user = $_POST['id_user'];
 $nama = $_POST['nama'];
 $username = $_POST['username'];
 $password = $_POST['password'];
 $level = $_POST['level'];

 	if (isset($_POST['update'])) {
 		$myqry = "UPDATE user SET nama='$nama',
 								  username ='$username',
 								  password ='$password',
 								  level = '$level'
 								  WHERE id_user= '$_GET[id_user]'";
 		$dbh->exec($myqry);

 		if($myqry)
 			echo "<span class=berhasil>Data  Pengguna Berhasil Di Ubah,<a href=?hal=Pengguna>Lihat Data</a></span>";

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