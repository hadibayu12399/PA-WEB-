<?php
include "koneksi.php";
	if (isset($_GET[kode_barang])) {
		$hapus="DELETE FROM tb_stok WHERE kode_barang='$_GET[kode_barang]'";
		$dbh->exec($hapus);
	}
	header('location:?hal=Stok');
?>