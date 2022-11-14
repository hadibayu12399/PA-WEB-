<?php
include "koneksi.php";
	if (isset($_GET[no_pinjam])) {
		$hapus = "DELETE FROM tb_pinjam_barang WHERE no_pinjam='$_GET[no_pinjam]'";
		$dbh->exec($hapus);
	}
	header('location:?hal=PinjamBarang');
?>