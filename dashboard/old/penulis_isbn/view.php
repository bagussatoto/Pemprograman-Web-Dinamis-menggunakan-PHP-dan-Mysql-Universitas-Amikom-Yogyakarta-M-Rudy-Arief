<?php
    include "../config/koneksi.php";

    $tampil = mysql_query("SELECT * FROM penulis p,buku b, penulis_isbn pi 
                            WHERE p.IDPenulis=pi.IDPenulis AND b.isbn=pi.isbn
                            ORDER BY p.IDPenulis");
  	$get=mysql_num_rows($tampil);
	  
	  echo "<h2>Penulis ISBN</h2><input type=button class='cButton' value='Tambah' onclick=\"window.location.href='input.php';\">";
	  
    if($get){
		echo" <table  bgcolor='#fff123'>
          <tr><th>No</th><th>Penulis</th><th>ISBN</th><th>Aksi</th></tr>";
          
    $no =1;
    while($r=mysql_fetch_array($tampil)){
	  
	  //deklarasi variable
	  $IDPenulis=$r['IDPenulis'];
	  $namaPenulis=$r['namaPenulis']; 
	  $isbn=$r['isbn'];
	  $judul=$r['judul'];

  	
     
      echo "<td>$no</td>
                <td>$namaPenulis</td>
                <td>$judul</td>
                
            <td><input type=button class='cButton' value='Edit' onclick=\"window.location.href='edit.php?idp=$IDPenulis&isbn=$isbn';\">
                | <input type=button class='cButton' value='Hapus' 
                onclick=\"window.location.href='delete.php?module=penulis_isbn&act=hapus&idp=$IDPenulis&isbn=$isbn'; \" > </td>
                  </tr>";
      $no++;
    
    }
    echo"</table>";
    }
    
?>
