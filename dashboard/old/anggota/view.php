<?php
    include "../config/koneksi.php";

    $tampil = mysql_query("SELECT a.IDAnggota,a.namaAnggota,a.kelas,pr.namaProdi FROM anggota a, prodi pr
						 WHERE a.prodi=pr.IDProdi ORDER BY a.IDAnggota DESC");
  	$get_ang=mysql_num_rows($tampil);
	  
	  echo "<h2>Anggota Perpustakaan</h2><input type=button class='cButton' value='Tambah' onclick=\"window.location.href='input.php';\">";
	  
    if($get_ang){
		echo" <table  bgcolor='#fff123'>
          <tr><th>No</th><th>Nama</th><th>Program Studi</th><th>Kelas</th><th>Aksi</th></tr>";
          
    $no =1;
    while($r=mysql_fetch_array($tampil)){
	  
	  //deklarasi variable
	  $IDAnggota=$r['IDAnggota'];
	 
	  $namaAnggota=$r['namaAnggota'];
	  $namaProdi=$r['namaProdi'];
	  $kelas=$r['kelas'];
	  	
      echo "<td>$no</td>
                <td>$namaAnggota</td>
                <td>$namaProdi</td>
                <td>$kelas</td>
                
            </td><td><input type=button class='cButton' value='Edit' onclick=\"window.location.href='edit.php?IDAnggota=$IDAnggota';\">
                | <input type=button class='cButton' value='Hapus' 
                onclick=\"window.location.href='delete.php?module=anggota&act=hapus&IDAnggota=$IDAnggota'; \" > </td>
                  </tr>";
      $no++;
   
    }
     echo"</table>";
    }
    
?>
