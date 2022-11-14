<?php
include "koneksi.php";
	if (isset($_GET[id_msk_brg])) {
		$hapus = "DELETE FROM tb_masuk WHERE id_msk_brg='$_GET[id_msk_brg]'";
		$success = $dbh->exec($hapus);
	}

	header('location:?hal=MasukBarang');
	
?>