<?php
//include "../config/koneksi.php";
$aksi="buku/input.proses.php";
  
  //query category
  $penerbit=mysql_query("SELECT IDPenerbit, namaPenerbit FROM penerbit ORDER BY namaPenerbit ASC");
  $cc=mysql_num_rows($penerbit);
  
  if($cc<1){
	  echo"Mohon inputkan dulu penerbit <a href='?v=penerbit&act=input' title='Penerbit'>disini</a>";
	  }
  else{ 
?>

<form id="form" name="form" method="post" action="<?php echo $aksi;?>?module=buku&act=insert" enctype="multipart/form-data">
<table width='610'>
<tr><td>ISBN: *</td><td><input name="_isbn" size="25" maxlength="512" type="text"></td></tr>
<tr><td>Penerbit: *</td><td>     
<?php 
echo"<select name='_IDPenerbit'>
<option value=''>-Penerbit-</option>";
while($r=mysql_fetch_array($penerbit)){
 $IDPenerbit=$r['IDPenerbit'];
 $namaPenerbit=$r['namaPenerbit'];
 echo"<option value='$IDPenerbit'>$namaPenerbit</option>";
 }
echo"/select>";
?>
</td></tr>

<tr><td>Judul: *</td><td><input name="_judul" size="25" maxlength="512" type="text"></td></tr>
<tr><td>Nomor Edisi: *</td><td><input name="_nomorEdisi" size="25" maxlength="512" type="text"></td></tr>
<tr><td>Copyright: *</td><td><input name="_copyright" size="25" maxlength="512" type="text"></td></tr>
<tr><td>Deksripsi: *</td><td><textarea name="_deskripsi" cols="30" rows="5"></textarea></td></tr>
<tr><td>Harga: *</td><td><input name="_harga" size="25" maxlength="512" type="text"></td></tr>
<tr><td>Gambar:</td><td><input name="image" size="25" maxlength="512" type="file"></td></tr>

<tr><td><input value="Submit" type="submit"></td><td><input type=button class='cButton' value=Batal onclick=self.history.back()></td></tr>
</table>
</form>
<?php
}
?>
