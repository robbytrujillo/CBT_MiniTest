<?php
if ($halaman>$jmldata){ //Jika Test Sudah Selesai Dikerjakan
		echo "<p>&nbsp;</p><p>Dari Total Jumlah <b>$jmldata</b> Soal, ";
		//Hitung Pertanyaan Yang Mempunyai Jawaban Benar
		$jawab= mysqli_query($konek, "SELECT count(jawaban.jawaban) as jml FROM tabel_soal, jawaban WHERE jawaban.id_soal=tabel_soal.id_soal AND jawaban.jawaban=tabel_soal.jawaban_benar");
		while($b = mysqli_fetch_array($jawab))
		{
		//Hitung Pertanyaan Yang Di Jawab
		$terjawab = mysqli_query($konek, "SELECT * FROM jawaban");
		$t = mysqli_num_rows($terjawab);
		//Hitung Jumlah Jawaban Yang Salah
		$salah = $t - $b['jml'];
		//Hitung Pertanyaan Belum Dijawab
		$sukses = $jmldata - $t;
		//Tampilkan PErtanyaan Belum Dijawab
		echo "Sebanyak<b> $sukses</b> Pertanyaan Belum Dijawab</p>";
		//Tampilkan Jumlah PErtanyaan Yang Dijawab
		echo "<p>Ada Sebanyak <b>$t</b> Pertanyaan Yang Berhasil Dijawab</p>";
		//Tampilkan Jumlah Jawaban Benar
		echo "<p>Jawaban Benar Sebanyak<b> $b[jml]</b> Jawaban</p>";
		//Tampilkan Jumlah PErtanyaan Yang Salah Menjawab		
		echo "<p>Ada Sebanyak <b>$salah</b> Pertanyaan Salah Dijawab</p>";
		//Tampilkan Tombol Selesai TEst 
		echo"<p>&nbsp;</p>";
		echo"<a href='simpan.php?act=selesai' class='button add'>Selesai</a>";
		}
		}
		else //Tampilkan Halaman Soal Ketika Test Belum Selesai
		{
		echo "<br>Halaman : ";
		
		$hal  = mysqli_query($konek, "select * from tabel_soal");		
		$jmldata=mysqli_num_rows($hal);
		$jmlhalaman=ceil($jmldata/$batas);
		
		for($i=1;$i<=$jmlhalaman;$i++)
		if ($i != $halaman)
		{
			echo " <a href=$_SERVER[PHP_SELF]?halaman=$i>$i</a> | ";
		}
		else
		{
			echo " <b>$i</b> | ";
		}
		
}	
?>