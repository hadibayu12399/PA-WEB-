<?php
	$aksi = @$_GET['aksi'];
		switch ($aksi) {
			case 'tambah':
				include "tambah.php";
				break;

			case 'ubah' :
				include "ubah.php";
				break;

			case 'hapus' :
				include "hapus.php";
				break;
			case 'cari':
				include "cari.php";
				break;
					
			default:
				include "lihat.php";
				break;
		}
?>