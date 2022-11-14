<?php
session_start();
	if(!empty($_SESSION['username']) and $_SESSION['level']=="Petugas"){
?>
<?php
include "session.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>APLIKASI INVENTARIS SARANA DAN PRASANA</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="icon" href="assets/img/favicon (7).ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/sweetalert.css">

	
	<link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.min.css">

    <!-- Bootstra css -->

    <!-- Efek Node -->
    <link href="assets/css/waves.css" rel="stylesheet" />

    <!-- Animasi Css -->
    <link href="assets/css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="assets/csss/morris.css" rel="stylesheet" />

</head>
<body>
	<div class="nav-header">
	<a href="#" class="nav-logo"><img src="assets/img/LOGONAV.PNG"></a>
	<a href="logout.php" class="nav-help"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Keluar</a>
	<a href="?hal=Bantuan" class="nav-log"><i class="fa fa-question-circle "></i>&nbsp;&nbsp;Bantuan</a>
	</div>
	<div class="left-bar">
		<div class="menu">
			<img src="assets/img/profile.png" align="center">
		</div>
		<div class="menuname">
			<p align="center"><b><?php echo $_SESSION['username']?>
			</b></p>
			<p align="center"><?php echo $_SESSION['level']?></p>
		</div>
		<div class="navigasi">
			<ul>
				<li><a href="?" class="<?php echo !isset($_GET['hal']) ? 'active' : '';?>"><i class="fa fa-home"></i> &nbsp;BERANDA</a></li>
				
				<li><a href="?hal=Barang" class="<?php echo isset($_GET['hal']) && $_GET['hal'] == 'Barang' ? 'active' : '';?>"><i class="fa fa-cubes"></i> &nbsp;DATA BARANG</a></li>

				<li><a href="?hal=Supplier" class="<?php echo isset($_GET['hal']) && $_GET['hal'] == 'Supplier' ? 'active' : '';?>"><i class="fa fa-user-secret"></i> &nbsp;DATA SUPPLIER</a></li>	
				
				<li><a href="?hal=Stok" class="<?php echo isset($_GET['hal']) && $_GET['hal'] == 'Stok' ? 'active' : '';?>"><i class="fa fa-clipboard"></i> &nbsp;DATA STOK</a></li>	
				
				<li><a href="?hal=MasukBarang" class="<?php echo isset($_GET['hal']) && $_GET['hal'] == 'MasukBarang' ? 'active' : '';?>"><i class="fa fa-window-restore"></i> &nbsp;DATA MASUK BARANG</a></li>
				
				<li><a href="?hal=PinjamBarang" class="<?php echo isset($_GET['hal']) && $_GET['hal'] == 'PinjamBarang' ? 'active' : '';?>"><i class="fa fa-window-maximize"></i> &nbsp;DATA PINJAM BARANG</a></li>
				
				<li><a href="?hal=KeluarBarang" class="<?php echo isset($_GET['hal']) && $_GET['hal'] == 'KeluarBarang' ? 'active' : '';?>"><i class="fa fa-th-large"></i> &nbsp;DATA KELUAR BARANG</a></li>	
			
			</ul>
			</div>
		</div>
	<?php
		include "Modules/Petugas/index.php";
	?>

	<script type="text/javascript" src="assets/js/sweetalert.min.js"></script>
	
	<script type="text/javascript">

	<?php
	if(isset($_GET['login']) && $_GET['login'] == 2):
	?>
		swal("Anda Berhasil Login !", "Selamat Datang Di Aplikasi Inventaris Sarana Dan Prasana Berbasis Web, Anda Tidak Sepenuhnya Mengakses Aplikasi Inventaris Sarana Dan Prasana ini!", "success");
	<?php
	endif;
	?>
	</script>

</body>
</html>




    <!-- Bootstrap Core Js -->
    <script src="assets/js/bootstrap.js"></script>

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap.min.js"></script>

    <!-- Select Plugin Js -->
    <script src="assets/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="assets/js/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="assets/js/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="assets/js/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="assets/js/morris.js"></script>

    <!-- ChartJs -->
    <script src="assets/js/Chart.bundle.js"></script>

<?php
}
?>