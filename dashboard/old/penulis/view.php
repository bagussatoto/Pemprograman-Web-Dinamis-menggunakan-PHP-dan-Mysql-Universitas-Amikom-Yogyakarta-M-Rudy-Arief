<?php
    include "../config/koneksi.php";

    $tampil = mysql_query("SELECT * FROM penulis ORDER BY IDPenulis DESC");
  	$get_pen=mysql_num_rows($tampil);
	  
	  echo "
    <h2>Penulis</h2>
    <input type=button class='cButton' value='Tambah' onclick=\"window.location.href='input.php';\">";
	  
    if($get_pen){
		echo"<table bgcolor='#fff123'>
          <tr><th>No</th><th width='100'>Nama</th><th width='255'>Alamat</th><th>Aksi</th></tr>";
	  
    $no =1;
    while($r=mysql_fetch_array($tampil)){
      $IDPenulis=$r['IDPenulis'];
      $namaPenulis=$r['namaPenulis'];
      $alamatPenulis=$r['alamatPenulis'];   
    
      echo "<tr><td>$no</td>
                <td>$namaPenulis</td>
                <td>$alamatPenulis</td>
                ";
                
     echo "</td><td><input type=button class='cButton' value='Edit' onclick=\"window.location.href='edit.php?&IDPenulis=$IDPenulis'; \">
          | <input type=button value='Hapus' 
          onclick=\"window.location.href='delete.php?module=penulis&act=hapus&IDPenulis=$IDPenulis'; \" > </td>
		        </tr>";
      $no++;
    }
		echo "</table>";
    }
    
?>
