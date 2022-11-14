<?php
define('HOME', 'HOME');
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
			
				<li><a href="?hal=Pengguna" class="<?php echo isset($_GET['hal']) && $_GET['hal'] == 'Pengguna' ? 'active' : ''; ?>"><i class="fa fa-user"></i> &nbsp;PENGGUNA</a></li>
			
			</ul>
			</div>
		</div>
	<div id="load-product">
		<?php include "Modules/Administrator/index.php" ?>		
	</div>
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/sweetalert.min.js"></script>
	
	<script type="text/javascript">

	<?php
	if(isset($_GET['login']) && $_GET['login'] == 1):
	?>
		swal("Anda Berhasil Login !", "Selamat Datang Di Aplikasi Inventaris Sarana Dan Prasana Berbasis Web Anda Sepenuhnya Berhak Bisa Mengakses Aplikasi Inventaris Sarana Dan Prasana ini!", "success");
	<?php
	endif;
	?>
	</script>

	<script>
	$(document).ready(function(){
		
		readProducts(); /* it will load products when document loads */
		
		<?php
		if(isset($_GET["update"]) && $_GET["update"] == "true") {
			echo 'swal("Berhasil", "Data Berhasil Di Ubah!", "success");';
		}

		if(isset($_GET["hapus"]) && $_GET["hapus"] == "true") {
			echo 'swal("Berhasil", "Data Berhasil Di Hapus!", "success");';
		}
		?>

		$('#barang_delete').on('click', function(e){
			/*
			var productId = $(this).data('id');
			SwalDelete(productId);
			
			*/

			var link = $(this).attr('href');
			//link += "&hapus=true";

			e.preventDefault();
			swal({
		        title: "Apakah Anda Ingin Menghapus Data ini?",
		        type: "warning",
		        showCancelButton: true,
		        confirmButtonColor: '#DD6B55',
		        confirmButtonText: 'YA!',
		        cancelButtonText: "Tidak!",
		        closeOnConfirm: false,
		        closeOnCancel: false
		    },
		    function(isConfirm) {
		        if (isConfirm) {
		            window.location.href = link;

		        } 
		        else {
		            swal("Berhasil", "Data Tidak Di Ubah!", "success");
		        }
		    });


		});



		
	});
	
	function SwalDelete(productId){
		
		swal({
			title: 'Are you sure?',
			text: "It will be deleted permanently!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!',
			showLoaderOnConfirm: true,
			  
			preConfirm: function() {
			  return new Promise(function(resolve) {
			       
			     $.ajax({
			   		url: 'hapus.php',
			    	type: 'POST',
			       	data: 'delete='+productId,
			       	dataType: 'json'
			     })
			     .done(function(response){
			     	swal('Deleted!', response.message, response.status);
					readProducts();
			     })
			     .fail(function(){
			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
			     });
			  });
		    },
			allowOutsideClick: false			  
		});	
		
	}
	
	function readProducts(){
		$('#load-products').load('index.php');	
	}
	
</script>



</body>
</html>




