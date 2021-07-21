<?php
include "../config/koneksi.php";
$aksi="input.proses.php";
  
  //query category
  $prodi=mysql_query("SELECT * FROM prodi ORDER BY namaProdi ASC");
  $cc=mysql_num_rows($prodi);
  
  if($cc<1){
	  echo"Mohon inputkan dulu Program Jurusan <a href='' title=''>disini</a>";
	  }
   else{ 
?>

<form method="post" action="input.proses.php?module=anggota&act=insert" enctype="multipart/form-data">
<table>
<tr><td colspan=2><label><pre>Nama: *</pre></label><input name="_name" id="_name" size="25" maxlength="512" type="text"></td></tr>
<tr><td colspan=2><label><pre>Program Jurusan : *</pre>     
<?php 
echo"<select name='_idprodi'>
<option value=''>Pilih Prodi...</option>";
while($rpro=mysql_fetch_array($prodi)){
 $idprodi=$rpro['IDProdi'];
 $nameprodi=$rpro['namaProdi'];
 echo"<option value='$idprodi'>$nameprodi</option>";
 }
echo"</select>";
?>
</td></tr>
<tr><td colspan=2><label><pre>Kelas : *</pre></label><input name="_kelas" id="_kelas" size="25" maxlength="512" type="text"></td></tr>
<table>
<tr><td><input class='cButton' value="Submit" type="submit"></td><td><input type=button class='cButton' value=Batal onclick=self.history.back()></td></tr>
</table>
</form>
<?php
}
?>
