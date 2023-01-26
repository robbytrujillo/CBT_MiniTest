<?php
//Menampilkan Jawaban
echo"<table>
    <tr><th>No</th><th>Pertanyaan</th><th>Jawaban</th></tr>";

	$query  = "SELECT * FROM tabel_soal, jawaban WHERE jawaban.id_soal=tabel_soal.id_soal ORDER BY tabel_soal.id_soal ASC";
	$hasil = mysqli_query($konek, $query);
	 
	$no=1;
while($h = mysqli_fetch_array($hasil))
{	echo "<tr><td>$h[id_soal]</td>
		<td>$h[pertanyaan]</td>
		<td>$h[jawaban]</td></tr>";
  $no++;
  
  }
  echo"</table>";
  ?>