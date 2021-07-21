<?php
include "../config/koneksi.php";
$aksi="input.proses.php";
  
  //query dapatkan penulis
  $penulis=mysql_query("SELECT IDPenulis,namaPenulis FROM penulis ORDER BY namaPenulis ASC");
  $getpenulis=mysql_num_rows($penulis);
  
  //query dapatkan buku
  $buku=mysql_query("SELECT isbn,judul FROM buku ORDER BY judul ASC");
  $getbuku=mysql_num_rows($buku);
  
  
  if(empty($getpenulis)){
	  echo"Mohon inputkan dulu penulis <a href='../penulis/input.php?module=penulis' title='Tambah Penulis'>disini</a>";
	  }
	elseif(empty($getbuku)){
	  echo"Mohon inputkan dulu buku <a href='../buku/input.php?module=buku' title='Tambah Buku'>disini</a>";
	  }  
   else{ 
?>

<form method="post" action="input.proses.php?module=penulis_isbn&act=insert" enctype="multipart/form-data">
<table>
<tr><td colspan=2><label><pre>Penulis</pre></label>
<select name="_IDPenulis">
	
<?php
		
	if($_GET['IDP']==''){
			
			echo "<option value=''>-Pilih Penulis-</option>";
			
			}
  
    while ($r=mysql_fetch_array($penulis)){
    $IDPenulis=$r['IDPenulis'];
    $namaPenulis=$r['namaPenulis'];
    
    if($_GET['IDP']==$IDPenulis){
	echo "<option value='$IDPenulis' selected>$namaPenulis</option>";
	}
	else {
	
	  echo "<option value='$IDPenulis'>$namaPenulis</option>";	
	
	}
    
    }

?>
</select>
</td></tr>
<tr><td colspan=2><label><pre>Buku</pre>     
<?php 

echo"<select name='_isbn'>";
if($_GET['isbn']==''){
echo "<option value=''>-Pilih Buku-</option>";
}

while($r2=mysql_fetch_array($buku)){
 $isbn=$r2['isbn'];
 $judul=$r2['judul'];

	if($_GET['isbn']==$isbn){
		echo "<option value='$isbn'>$judul</option>";
		}	
	else {
		echo"<option value='".$isbn."'>$judul</option>";
	}
 }
echo"</select>";


?>
</td></tr>
</table>
<table>
<tr><td><input class='cButton' value="Submit" type="submit"></td><td><input type=button class='cButton' value=Batal onclick=self.history.back()></td></tr>
</table>
</form>
<?php
}
?>
