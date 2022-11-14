<?php
include "koneksi.php";
	if (isset($_GET[id_brg_keluar])) {
		$hapus = "DELETE FROM tb_keluar_barang WHERE id_brg_keluar='$_GET[id_brg_keluar]'";
		$dbh->exec($hapus);
	}
	header('location:?hal=KeluarBarang');
?>