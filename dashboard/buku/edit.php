<?php
//include "../config/koneksi.php";
  
  $Gisbn=$_GET['isbn'];
  $buku=mysql_query("SELECT * FROM buku WHERE isbn='$Gisbn'");
  $r=mysql_fetch_array($buku);
  $get=mysql_num_rows($buku);
  
   //deklarasi variable
	  $isbn=$r['isbn'];
	  $judul=$r['judul'];
	  $nomorEdisi=$r['nomorEdisi'];
	  $copyright=$r['copyright'];
	  $deskripsi=$r['deskripsi'];
	  $IDPenerbit=$r['IDPenerbit'];
	  $fileGambar='img/thumb_'.$r['fileGambar'];
	  $harga=$r['harga'];
  
  //query category
  $penerbit=mysql_query("SELECT IDPenerbit, namaPenerbit FROM penerbit ORDER BY namaPenerbit ASC");
  $cc=mysql_num_rows($penerbit);
  
  if($cc<1){
	  echo"Mohon inputkan dulu penerbit <a href='?v=penerbit' title='Penerbit'>disini</a>";
	  }
  elseif($get){ 
?>

<form id="form" name="form" method="post" action="buku/edit.proses.php?module=buku&act=update" enctype="multipart/form-data">
<table width="610">
<input name="_isbn" size="25" maxlength="512" type="hidden" 
value="<?php echo $isbn;?>">
<tr><td>ISBN: </td><td><input size="25" maxlength="512" type="text"
value="<?php echo $isbn;?>"
disabled /></td></tr>
<tr><td>Penerbit: *</td><td>     
	<select name="_IDPenerbit">
<?php 
	if($IDPenerbit==0){
	echo"<option value=''>-Penerbit-</option>";
	}
while($r=mysql_fetch_array($penerbit)){
		
		if($IDPenerbit==$r['IDPenerbit']){
				echo"<option value='$r[IDPenerbit]' selected>$r[namaPenerbit]</option>";
 			}
 		else {	
		
		echo"<option value='$r[IDPenerbit]'>$r[namaPenerbit]</option>";
		
		}
 }
echo"/select>";
?>
</td></tr>

<tr><td>Judul: *</td><td><input name="_judul" size="25" maxlength="512" type="text"
value="<?php echo $judul;?>"
></td></tr>
<tr><td>Nomor Edisi: *</td><td><input name="_nomorEdisi" size="25" maxlength="512" type="text"
value="<?php echo $nomorEdisi;?>"
></td></tr>
<tr><td>Copyright: *</td><td><input name="_copyright" size="25" maxlength="512" type="text"
value="<?php echo $copyright;?>"
></td></tr>
<tr><td>Deksripsi: *</td><td><textarea name="_deskripsi" cols="30" rows="5">
<?php echo $deskripsi;?>
</textarea></td></tr>
<tr><td>Harga: *</td><td><input name="_harga" size="25" maxlength="512" type="text"
value="<?php echo $harga;?>"
></td></tr>
<tr><td>Gambar:</td><td>
<?php
	if(file_exists($fileGambar)){
		echo "<img src='$fileGambar' alt='$judul' />";
	}
	else {
		echo 'Belum ada foto.';
	}	
?>
<input name="image" size="25" maxlength="512" type="file"></td></tr>
<table>
<tr><td><input value="Update" type="submit"></td><td><input type=button class='cButton' value=Batal onclick=self.history.back()></td></tr>
</table>
</form>
<?php
}
?>
