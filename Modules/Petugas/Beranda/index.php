<div class="page-header">
		<h3>Selamat Datang!</h3>
		<p1>Aplikasi Inventaris Sarana Dan Prasana <b>INSAPRA</b> Yang Akan Memudahkan Anda!</p1>
</div>
<div class="container">
	<div class="acc">
	<div class="bg">
		<div class="small">
				<div class="desc">
					<i class="fa fa-window-restore"></i> &nbsp;JUMLAH MASUK BARANG
					<?php
					include "koneksi.php";
						$nRows = $dbh->query('select count(*) from tb_masuk')->fetchColumn(); 
					?>
					<p><?php echo $nRows ?></p>
				</div>
			</div>
		</div>
	</div>
	<div class="acc">
	<div class="bg2">
		<div class="small">
				<div class="desc">
					<i class="fa fa-window-maximize"></i> &nbsp;JUMLAH PINJAM BARANG
					<?php
						$nRows = $dbh->query('select count(*) from tb_pinjam_barang')->fetchColumn(); 
					?>
					<p><?php echo $nRows ?></p>
				</div>
			</div>
		</div>
	</div>
	<div class="acc">
		<div class="bg3">
		<div class="small">
			<div class="desc">
				<i class="fa fa-th-large"></i> &nbsp;JUMLAH KELUAR BARANG
				<?php
						$nRows = $dbh->query('select count(*) from tb_keluar_barang')->fetchColumn(); 
					?>
					<p><?php echo $nRows ?></p>
			</div>
		</div>
		</div>
	</div>
</div>
<div class="box-b">
	<table class="table" border="1" align="center">
		<tr>
			<th>Barang</th>
			<th>Jumlah Barang Masuk</th>
			<th>Jumlah Barang Keluar</th>
			<th>Total Barang Tersedia</th>
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
		</tr>
		<?php
		}
		?>
	</table>
</div>



<style type="text/css">
	.box-b{
			background: #fff;
		 	width: 1100px;
		 	margin-left: 250px;
			position: absolute;
			overflow-y:scroll;
			text-align: center;
			top: 350px;
			color: #7a878e;
	}
</style>

