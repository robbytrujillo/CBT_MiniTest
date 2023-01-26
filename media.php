<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Mini Test Kolaborasi PHP & MY SQL</title>
	<meta http-equiv="Copyright" content="Imago Media">
	<meta name="author" content="Agus Hariyanto">
	<meta http-equiv="imagetoolbar" content="no">
	<meta name="language" content="Indonesia">
	<meta name="revisit-after" content="7">
	<meta name="webcrawlers" content="all">
	<meta name="rating" content="general">
	<meta name="spiders" content="all">
	<link rel="shortcut icon" href="image/favicon1.png" type="image/x-icon" />
	<link href="css/style.css" rel="stylesheet" type="text/css">

	<style type="text/css">
		* {
			padding: 0px;
			margin: 0px;
		}

		textarea {
			border: solid 1px #333;
			width: 520px;
			height: 30px;
			font-family: arial;
			padding: 5px
		}

		.main {
			margin: 0 auto;
			width: 600px;
			text-align: left:
		}

		.updates {
			padding: 20px 10px 20px 10px;
			border-bottom: dashed 1px #999;
			background-color: #f2f2f2;
		}

		.button {
			padding: 10px;
			float: left;
			background-color: #006699;
			color: #fff;
			font-weight: bold;
			text-decoration: none;

		}

		.updates a {
			color: #cc0000;
			font-size: 12px;

		}

		body {
			font-family: Tahoma, Geneva, sans-serif;
			font-size: 14px;
			margin: 0;
			padding: 0;
			background-color: #CCCCCC
		}

		#info {
			position: fixed;
			width: 100%;
			height: 20px;
			-webkit-box-shadow: 0 1px 2px #666;
			box-shadow: 0 1px 2px #666;
			top: 0;
			padding: 10px;
			color: #FF0;
			background-color: #0033FF;
			font-size: 14px;
		}

		#isi {
			background-color: #FFFFFF;
			text-align: left;
			margin: 0 auto;
			padding: 200px;
			width: 920px;
			padding-left: 80px;
			padding-right: 80px;
			padding-top: 90px
		}
	</style>
</head>

<body>
	<div id="info"><img src="image/logo1r.png" width="70" height="20"> &nbsp; simple CBT system
		<strong> &nbsp;
			<a href="https://robbytrujillo.github.io/CV/"
				style="text-transform:lowercase; color:#FF0; text-decoration:none;" target="_blank">Robby
				Ilhamkusuma</a></strong>
	</div>
	<div id="isi">
		<?php
		include("koneksi.php"); //Koneksi Database Dengan Memanggil File Config
		include("modul/tampil_jawaban.php");
		//Langkah 1: Tentukan batas,cek halaman & posisi data
		$batas = 1;
		$halaman = $_GET['halaman'];
		if (empty($halaman)) {
			$posisi = 0;
			$halaman = 1;
		} else {
			$posisi = ($halaman - 1) * $batas;
		}
		echo "<p>&nbsp;</p>";

		//Membatasi data dari SQL
		$aksi = "simpan.php";
		$query = "SELECT * FROM tabel_soal ORDER BY id_soal ASC LIMIT $posisi, $batas";
		$data = mysqli_query($konek, $query);

		$no = $posisi + 1; // Agar angka (penomoran) mengikuti paging
		while ($r = mysqli_fetch_array($data)) {
			$cek = mysqli_query($konek, "SELECT * FROM jawaban WHERE id_soal=$r[id_soal]");
			$ketemu = mysqli_num_rows($cek);
			if ($ketemu > 0) { //Tampilkan Soal Ketika Sudah Di Isi Untuk Memperbaiki Jawaban
				include("modul/soal_isi.php");
			} else //Tampilkan Soal Ketika Belum Di Isi
			{
				include("modul/soal_kosong.php");
			}
		}
		//Hitung total data dan halaman serta link 1,2,3 ...
		$hal = mysqli_query($konek, "select * from tabel_soal");
		$jmldata = mysqli_num_rows($hal);
		$jmlhalaman = ceil($jmldata / $batas);

		include("modul/test_selesai.php");

		?>

	</div>
	</div>
</body>

</html>