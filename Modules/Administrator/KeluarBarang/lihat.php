<div class="page-headerb">
	<p>Beranda / Keluar Barang / Tampil Data<p>
</div>
<div class="page-headernav">
	<a href="?hal=KeluarBarang&aksi=tambah" class="tambah"><i class="fa  fa-plus-circle"></i>&nbsp;&nbsp;Tambah</a>

	<div class="dropdown">
		<button><i class="fa fa-print"></i>&nbsp;&nbsp;Cetak Data</button>
	<div>
		<a href="laporan/KeluarBarang/laporan_print.php" onclick="print_d()"><i class="fa fa-file-text-o"></i>&nbsp;&nbsp;PRINT</a>
		<a href="laporan/KeluarBarang/laporan_pdf.php"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;PDF</a>
		<a href="laporan/KeluarBarang/laporan_excel.php"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;EXCEL</a>
	</div>
	</div>

	<form method="POST" class="cari" action="?hal=KeluarBarang&aksi=cari">
		<input type="text" placeholder="Cari Kode Keluar Barang" name="kata">
		<button type="submit" name="cari"><i class="fa fa-search" class="cari"></i></button>
	</form>
</div>

<div class="box">
	<table class="table" border="1" align="center">
		<tr>
			<th>ID Keluar Barang</th>
			<th>Barang</th>
			<th>Tanggal Keluar</th>
			<th>Penerima</th>
			<th>Jumlah Keluar</th>
			<th>Keterangan</th>
			<th>Aksi</th>
		</tr>
		<?php
		include "koneksi.php";
		$tampil = "SELECT * FROM tb_keluar_barang a JOIN tb_barang b ON a.kode_barang = b.kode_barang";
		$query =$dbh->query($tampil);
		foreach ($query as $data) {
		?>
		<tr>
			<td><?php echo $data['id_brg_keluar']?></td>
			<td><?php echo $data['kode_barang']. ' | '.$data['nama_barang']?></td>
			<td><?php echo $data['tgl_keluar']?></td>
			<td><?php echo $data['penerima']?></td>
			<td><?php echo $data['jml_brg_keluar']?></td>
			<td><?php echo $data['keperluan']?></td>
			<td>
				<button><a href="?hal=KeluarBarang&aksi=ubah&id_brg_keluar=<?php echo $data['id_brg_keluar']?>"onclick="return confirm('Apakah Anda Ingin Ubah Data ini?')" title="Ubah"><i class="fa fa-pencil"></i></button></a>
					-
				<button><a href="?hal=KeluarBarang&aksi=hapus&id_brg_keluar=<?php echo $data['id_brg_keluar']?>"onclick="return confirm('Apakah Anda Ingin Menghapus Data ini')" title="Hapus"><i class="fa  fa-trash"></i></button>
			</td>
		</tr>
		<?php
		}
		?>
	</table>
	<?php
				$nRows = $dbh->query('select count(*) from tb_keluar_barang')->fetchColumn(); 
				echo "<p class=jumlahdata>Jumlah Data Keluar Barang : $nRows </p>";
		?>
</div>

