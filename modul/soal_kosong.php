<?php
//Tampilan Halaman Paging
		echo "<ul class='page_result'>";
		echo "<form method=POST enctype='multipart/form-data' action='$aksi?module=jawaban&act=input'>
		 <input type=hidden name=id_soal value=$r[id_soal]>
		<input type=hidden name=halaman value=$halaman>
		 <li id='item'><span class='page_name'>$no</span>
		<span class='page_name'>$r[pertanyaan]</span>";
		$soal   = mysqli_query($konek, "SELECT * FROM jawaban WHERE id_soal=$r[id_soal]");
		$j   = mysqli_fetch_array($soal);
		if ($j['jawaban']=='A'){ 
		echo"<ul><span class='page_message'><input type=radio name='jawaban' value='A' checked>A. $r[pilihan_a]</span></ul>
		<ul><span class='page_message'><input type=radio name='jawaban' value='B'>B. $r[pilihan_b]</span></ul>
		<ul><span class='page_message'><input type=radio name='jawaban' value='C'>C. $r[pilihan_c]</span></ul>
		<ul><span class='page_message'><input type=radio name='jawaban' value='D'>D. $r[pilihan_d]</span></ul>";
 		}
 		else if  ($j['jawaban']=='B'){ 
 		echo"<ul><span class='page_message'><input type=radio name='jawaban' value='A'>A. $r[pilihan_a]</span></ul>
 	  	<ul><span class='page_message'><input type=radio name='jawaban' value='B' checked>B. $r[pilihan_b]</span></ul>
	  	<ul><span class='page_message'><input type=radio name='jawaban' value='C'>C. $r[pilihan_c]</span></ul>
 	  	<ul><span class='page_message'><input type=radio name='jawaban' value='D'>D. $r[pilihan_d]</span></ul>";
 		}
  		else if  ($j['jawaban']=='C'){ 
 		echo"<ul><span class='page_message'><input type=radio name='jawaban' value='A'>A. $r[pilihan_a]</span></ul>
	  	<ul><span class='page_message'><input type=radio name='jawaban' value='B'>B. $r[pilihan_b]</span></ul>
 	  	<ul><span class='page_message'><input type=radio name='jawaban' value='C' checked>C. $r[pilihan_c]</span></ul>
	  	<ul><span class='page_message'><input type=radio name='jawaban' value='D'>D. $r[pilihan_d]</span></ul>";
		 }
	 	else if  ($j['jawaban']=='D'){ 
 		echo"<ul><span class='page_message'><input type=radio name='jawaban' value='A'>A. $r[pilihan_a]</span></ul>
	  	<ul><span class='page_message'><input type=radio name='jawaban' value='B'>B. $r[pilihan_b]</span></ul>
 	  	<ul><span class='page_message'><input type=radio name='jawaban' value='C'>C. $r[pilihan_c]</span></ul>
	  	<ul><span class='page_message'><input type=radio name='jawaban' value='D' checked>D. $r[pilihan_d]</span></ul>";
 		}
 		else { 
 		echo"<ul><span class='page_message'><input type=radio name='jawaban' value='A'>A. $r[pilihan_a]</span></ul>
	  	<ul><span class='page_message'><input type=radio name='jawaban' value='B'>B. $r[pilihan_b]</span></ul>
 	  	<ul><span class='page_message'><input type=radio name='jawaban' value='C'>C. $r[pilihan_c]</span></ul>
	  	<ul><span class='page_message'><input type=radio name='jawaban' value='D'>D. $r[pilihan_d]</span></ul>";
 		}
		 echo"
		 </li>
		 <td colspan=2><input type=submit value=Simpan></form>";
		$no++;
		
		echo "</ul>";
		?>