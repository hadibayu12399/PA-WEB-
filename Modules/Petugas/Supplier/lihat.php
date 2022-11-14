<div class="page-headerb">
	<p>Beranda / Supplier / Tampil Data<p>
</div>
<div class="page-headernav">
	<a href="?hal=Supplier&aksi=tambah" class="tambah"><i class="fa  fa-plus-circle"></i>&nbsp;&nbsp;Tambah</a>
	
	<div class="dropdown">
        <button><i class="fa fa-print"></i>&nbsp;&nbsp;Cetak Data</button>
    <div>
        <a href="laporan/Supplier/laporan_print.php" onclick="print_d()"><i class="fa fa-file-text-o"></i>&nbsp;&nbsp;PRINT</a>
        <a href="laporan/Supplier/laporan_pdf.php"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;PDF</a>
        <a href="laporan/Supplier/laporan_excel.php"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;EXCEL</a>
    </div>
    </div>

<form method="POST" class="cari" action="?hal=Supplier&aksi=cari">
        <input type="text" placeholder="Cari Kode Supplier" name="kata">
        <button type="submit" name="cari"><i class="fa fa-search" class="cari"></i></button>
    </form>
</div>

<div class="box">
	<table class="table" border="1" align="center">
		<tr>
			<th>Kode Supplier</th>
			<th>Nama Supplier</th>
			<th>Alamat Supplier</th>
			<th>Telepon</th>
			<th>Kota Supplier</th>
			<th>Aksi</th>
		</tr>
		<?php
		include "koneksi.php";
		$tampil = "SELECT * FROM tb_supplier";
		$query =$dbh->query($tampil);
		foreach ($query as $data) {
		?>
		<tr>
			<td><?php echo $data['kode_supplier']?></td>
			<td><?php echo $data['nama_supplier']?></td>
			<td><?php echo $data['alamat_supplier']?></td>
			<td><?php echo $data['telp_supplier']?></td>
			<td><?php echo $data['kota_supplier']?></td>
			<td>
				<button><a href="?hal=Supplier&aksi=ubah&kode_supplier=<?php echo $data['kode_supplier']?>"
					onclick="return confirm('Apakah Anda Ingin Ubah Data ini')" title="Ubah"><i class="fa fa-pencil"></i></button></a>
					-
				<button><a href="?hal=Supplier&aksi=hapus&kode_supplier=<?php echo $data['kode_supplier']?>"
					onclick="return confirm('Apakah Anda Ingin Menghapus Data ini')" title="Hapus"><i class="fa  fa-trash"></i></button></a>
			</td>
		</tr>
		<?php
		}
		?>
	</table>
		<?php
				$nRows = $dbh->query('select count(*) from tb_supplier')->fetchColumn(); 
				echo "<p class=jumlahdata>Jumlah Data Supplier : $nRows </p>";
		?>
</div>

