<div class="page-headerb">
	<p>Beranda / Pinjam Barang / Tampil Data<p>
</div>
<div class="page-headernav">

	<div class="dropdown">
		<button><i class="fa fa-print"></i>&nbsp;&nbsp;Cetak Data</button>
	<div>
		<a href="laporan/PinjamBarang/laporan_print.php" onclick="print_d()"><i class="fa fa-file-text-o"></i>&nbsp;&nbsp;PRINT</a>
		<a href="laporan/PinjamBarang/laporan_pdf.php"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;PDF</a>
		<a href="laporan/PinjamBarang/laporan_excel.php"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;EXCEL</a>
	</div>
	</div>

	 <form method="POST" class="cari" action="?hal=PinjamBarang&aksi=cari">
        <input type="text" placeholder="Cari No Pinjam" name="kata">
        <button type="submit" name="cari"><i class="fa fa-search" class="cari"></i></button>
    </form>
</div>

<div class="box">
	<table class="table" border="1" align="center">
		<tr>
			<th>No Pinjam</th>
			<th>Tanggal Pinjam</th>
			<th>Barang</th>
			<th>Jumlah</th>
			<th>Peminjam</th>
			<th>Tanggal Kembali</th>
			<th>Keterangan</th>
		</tr>
		<?php
		include "koneksi.php";
		$tampil = "SELECT * FROM tb_pinjam_barang a JOIN tb_barang b ON a.kode_barang = b.kode_barang";
		$query =$dbh->query($tampil);
		foreach ($query as $data) {
		?>
		<tr>
			<td><?php echo $data['no_pinjam']?></td>
			<td><?php echo $data['tgl_pinjam']?></td>
			<td><?php echo $data['kode_barang']. ' | '.$data['nama_barang']?></td>
			<td><?php echo $data['jml_pinjam']?></td>
			<td><?php echo $data['peminjam']?></td>
			<td><?php echo $data['tgl_kembali']?></td>
			<td><?php echo $data['keterangan']?></td>
		</tr>
		<?php
		}
		?>
	</table>
	<?php
				$nRows = $dbh->query('select count(*) from tb_pinjam_barang')->fetchColumn(); 
				echo "<p class=jumlahdata>Jumlah Data Pinjam Barang : $nRows </p>";
		?>
</div>

