<div class="page-headerb">
	<p>Beranda / Barang / Tampil Data<p>
</div>
<div class="page-headernav">
	<a href="?hal=Barang&aksi=tambah" class="tambah"><i class="fa  fa-plus-circle"></i>&nbsp;&nbsp;Tambah</a>

	<div class="dropdown">
		<button><i class="fa fa-print"></i>&nbsp;&nbsp;Cetak Data</button>
	<div>
		<a href="laporan/Barang/laporan_print.php" onclick="print_d()"><i class="fa fa-file-text-o"></i>&nbsp;&nbsp;PRINT</a>
		<a href="laporan/Barang/laporan_pdf.php"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;PDF</a>
		<a href="laporan/Barang/laporan_excel.php"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;EXCEL</a>
	</div>
	</div>
	
	  <form method="POST" class="cari" action="?hal=Barang&aksi=cari">
        <input type="text" placeholder="Cari Nama Barang" name="kata">
        <button type="submit" name="cari"><i class="fa fa-search" class="cari"></i></button>
    </form>
</div>

<div class="box">	
	<table class="table" border="1" align="center">
		<tr>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Spesifikasi</th>
			<th>Lokasi Barang</th>
			<th>Kategori</th>
			<th>Jumlah Barang</th>
			<th>Kondisi</th>
			<th>Jenis Barang</th>
			<th>Sumber Dana</th>
			<th>Aksi</th>
		</tr>
		<?php
		include "koneksi.php";
		$tampil = "SELECT * FROM tb_barang";
		$query = $dbh->query($tampil);
		foreach ($query as $data ){
		?>
		<tr>
			<td><?php echo $data['kode_barang']?></td>
			<td><?php echo $data['nama_barang']?></td>
			<td><?php echo $data['spesifikasi']?></td>
			<td><?php echo $data['lokasi_barang']?></td>
			<td><?php echo $data['kategori']?></td>
			<td><?php echo $data['jml_barang']?></td>
			<td><?php echo $data['kondisi']?></td>
			<td><?php echo $data['jenis_barang']?></td>
			<td><?php echo $data['sumber_dana']?></td>
			<td>
				<button><a href="?hal=Barang&aksi=ubah&kode_barang=<?php echo $data['kode_barang']?>"
					onclick="return confirm('Apakah Anda Ingin MengUbah Data ini')" title="Ubah"><i class="fa fa-pencil"></i></button></a>
				-
				<button><a href="?hal=Barang&aksi=hapus&kode_barang=<?php echo $data['kode_barang']?>"
					onclick="return confirm('Apakah Anda Ingin MengHapus Data ini')" title="Hapus"><i class="fa fa-trash"></i></button></a>
			</td>
		</tr>
		<?php
		}
		?>	

	</table>
	
		<?php
				$nRows = $dbh->query('select count(*) from tb_barang')->fetchColumn(); 
				echo "<p class=jumlahdata>Jumlah Data Barang : $nRows </p>";
		?>

</div>
