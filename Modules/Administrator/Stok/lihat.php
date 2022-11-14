<div class="page-headerb">
	<p>Beranda / Stok / Tampil Data<p>
</div>
<div class="page-headernav">
	<a href="?hal=Stok&aksi=tambah" class="tambah"><i class="fa  fa-plus-circle"></i>&nbsp;&nbsp;Tambah</a>

	<div class="dropdown">
		<button><i class="fa fa-print"></i>&nbsp;&nbsp;Cetak Data</button>
	<div>
		<a href="laporan/Stok/laporan_print.php" onclick="print_d()"><i class="fa fa-file-text-o"></i>&nbsp;&nbsp;PRINT</a>
		<a href="laporan/Stok/laporan_pdf.php"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;PDF</a>
		<a href="laporan/Stok/laporan_excel.php"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;EXCEL</a>
	</div>
</div>


	 <form method="POST" class="cari" action="?hal=Stok&aksi=cari">
        <input type="text" placeholder="Cari Kode Barang" name="kata">
        <button type="submit" name="cari"><i class="fa fa-search" class="cari"></i></button>
    </form>
</div>

<div class="box">
	<table class="table" border="1" align="center">
		<tr>
			<th>Barang</th>
			<th>Jumlah Barang Masuk</th>
			<th>Jumlah Barang Keluar</th>
			<th>Total Barang Tersedia</th>
			<th>Keterangan</th>
			<th>Aksi</th>
		</tr>
		<?php
		include "koneksi.php";
		$tampil = "SELECT * FROM v_stok";
		$query =$dbh->query($tampil);
		foreach ($query as $data) {
		?>
		<tr>
			<td><?php echo $data['kode_barang']. ' | '.$data['nama_barang'] ?></td>
			<td><?php echo $data['jml_masuk']?></td>
			<td><?php echo $data['jml_barang_keluar']?></td>
			<td><?php echo $data['jml_total']?></td>
			<td><?php echo $data['keterangan']?></td>
			<td>
				<button><a href="?hal=Stok&aksi=ubah&kode_barang=<?php echo $data['kode_barang']?>"
					onclick="return confirm('Apakah Anda Ingin Ubah Data ini')" title="Ubah"><i class="fa fa-pencil"></i></button></a>
					-
				<button><a href="?hal=Stok&aksi=hapus&kode_barang=<?php echo $data['kode_barang']?>"
					onclick="return confirm('Apakah Anda Ingin Menghapus Data ini?')" title="Hapus"><i class="fa  fa-trash"></i></button></a>
			</td>
		</tr>
		<?php
		}
		?>
	</table>
	<?php
				$nRows = $dbh->query('select count(*) from tb_stok')->fetchColumn(); 
				echo "<p class=jumlahdata>Jumlah Data Stok : $nRows </p>";
		?>
</div>

