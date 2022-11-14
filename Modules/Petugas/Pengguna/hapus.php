<?php
include "koneksi.php";
	if (isset($_GET[id_user])) {
		$hapus = "DELETE FROM user WHERE id_user='$_GET[id_user]'";

		$dbh->exec($hapus);

	if ($hapus)
		header('location:?hal=Pengguna');
	}
?>
