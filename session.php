<?php
session_start();

// echo $_SERVER['PHP_SELF'];

if(!isset($_SESSION ['sukses']) || empty($_SESSION ['sukses'])) {
	if(defined('HOME')) {
		header('Location: home.php');
	}	
}


if(isset($_POST['login'])){
	include "koneksi.php";
	$username=$_POST['username'];
	$password=$_POST['password'];

	$query=$dbh->prepare("SELECT * FROM user WHERE username=:username and password=:password");
	$query->BindParam(":username", $username);
	$query->BindParam(":password", $password);
	$query->execute();

	if($query->rowCount()>0){
		$_SESSION ['sukses']="sukses";
		$data=$query->fetch();
		if($data['level']=="Administrator"){
			$_SESSION['username']=$data['username'];
			$_SESSION['level']=$data['level'];
			header("location:index.php?login=1");
		}else{
			$_SESSION['username']=$data['username'];
			$_SESSION['level']=$data['level'];
			header('location:petugas.php?login=2');		}
	}
	else{

		echo "<script language='javascript'> alert('Koreksi Username dan Password Anda')</script>";
	}
}
?>