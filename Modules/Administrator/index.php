<?php
	$hal = @$_GET['hal'];
		switch ($hal) {
			case 'Barang':
				include "Barang/index.php";
				break;
			
			case 'Supplier':
				include "Supplier/index.php";
				break;

			case 'Stok':
				include "Stok/index.php";
				break;

			case 'MasukBarang':
				include "MasukBarang/index.php";
				break;

			case 'PinjamBarang':
				include "PinjamBarang/index.php";
				break;

			case 'KeluarBarang':
				include "KeluarBarang/index.php";
				break;

			case 'Pengguna':
				include "Pengguna/index.php";
				break;

			case 'Bantuan' :
					include "Bantuan/index.php";
					break;

			default:
				include "Beranda/index.php";
				break;
		}

?>