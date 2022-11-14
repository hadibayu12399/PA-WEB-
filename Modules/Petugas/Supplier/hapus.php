<?php
include "koneksi.php";
	if (isset($_GET[kode_supplier])) {
		$hapus = "DELETE FROM tb_supplier WHERE kode_supplier='$_GET[kode_supplier]'";
		$dbh->exec($hapus);
	}
	header('location:?hal=Supplier');
?>