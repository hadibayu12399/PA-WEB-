<div class="page-headerb">
	<p>Beranda / Barang Masuk / Tampil Data<p>
</div>
<div class="page-headernav">

	<div class="dropdown">
		<button><i class="fa fa-print"></i>&nbsp;&nbsp;Cetak Data</button>
	<div>
		<a href="laporan/MasukBarang/laporan_print.php" onclick="print_d()"><i class="fa fa-file-text-o"></i>&nbsp;&nbsp;PRINT</a>
		<a href="laporan/MasukBarang/laporan_pdf.php"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;PDF</a>
		<a href="laporan/MasukBarang/laporan_excel.php"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;EXCEL</a>
	</div>
	</div>
	
	<form method="POST" class="cari" action="?hal=MasukBarang&aksi=cari">
        <input type="text" placeholder="Cari ID Masuk Barang" name="kata">
        <button type="submit" name="cari"><i class="fa fa-search" class="cari"></i></button>
    </form>

</div>

<div class="box">
	<table class="table" border="1" align="center">
		<tr>
			<th>ID Masuk Barang</th>
			<th>Barang</th>
			<th>Tanggal Masuk</th>
			<th>Jumlah Masuk</th>
			<th>Supplier</th>
		</tr>
		<?php
		include "koneksi.php";
		$tampil = "SELECT * FROM tb_masuk a JOIN tb_barang b ON a.kode_barang = b.kode_barang JOIN tb_supplier c ON a.kode_supplier = c.kode_supplier";
		$query =$dbh->query($tampil);
		foreach ($query as $data) {
		?>
		<tr>
			<td><?php echo $data['id_msk_brg']?></td>
			<td><?php echo $data['kode_barang']. ' | ' .$data['nama_barang']?></td>
			<td><?php echo $data['tgl_masuk']?></td>
			<td><?php echo $data['jml_masuk']?></td>
			<td><?php echo $data['kode_supplier'] . ' | ' . $data['nama_supplier']?></td>
		</tr>
		<?php
		}
		?>
	</table>
	<?php
				$nRows = $dbh->query('select count(*) from tb_masuk')->fetchColumn(); 
				echo "<p class=jumlahdata>Jumlah Data Masuk Barang : $nRows </p>";
		?>
</div>

