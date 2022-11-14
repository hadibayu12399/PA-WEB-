<?php
include "koneksi.php";
	if (isset($_GET['kode_barang'])) {
		$hapus = "DELETE FROM tb_barang WHERE kode_barang='$_GET[kode_barang]'";
		$dbh->exec($hapus);
	}
header('location:?hal=Barang');


// 	header('Content-type:application/json; charset=UTF-8');

// 	$respone = array();

// if ($_POST['delete']){

// 	include "koneksi.php";

// 	if(isset($_GET['kode_barang'])){
// 	$hapus ="DELETE FROM tb_barang WHERE kode_barang='$_GET[kode_barang]'";
// 	$stmt = $dbh->prepare($hapus);
// 	$stmt->exec(array($_GET['kode_barang']=>$kode_barang));

// 	if($stmt){
// 		$response['status'] = 'success';
// 		$response['message'] = 'Product Delete Successfully ..';
// 	}else{
// 		$response['staus'] = 'error';
// 		$response['message'] = 'Unable to delete Product ..';
// 	}
// 	echo json_encode($response);
	
// }
?>