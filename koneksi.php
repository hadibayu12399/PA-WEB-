<?php
try{
		//buat koneksi dengan database
		$dbh = new PDO ('mysql:host=localhost;dbname=db_ukk_insapra', "root", "");

		//set eror mode
		$dbh ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	catch (PDOException $e){
		//tampilan	Pesan Kesalahan jika koneksi gagal
		print "koneksi Gagal atau Query Bermasalah :" . $e->getMessage() . "<br>";
		die();
}
?>