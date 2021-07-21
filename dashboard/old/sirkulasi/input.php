<?php
include "../config/koneksi.php";

//function combo nama bulan
function combonamabln($awal, $akhir, $var, $terpilih){
  $nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
                      "Juni", "Juli", "Agustus", "September", 
                      "Oktober", "November", "Desember");
  echo "<select name=$var>
  <option value=''>-bulan-</option>
  ";
  
  for ($bln=$awal; $bln<=$akhir; $bln++){
      
      if ($bln==$terpilih)
         echo "<option value=$bln selected>$nama_bln[$bln]</option>";
      else
        echo "<option value=$bln>$nama_bln[$bln]</option>";
  }
  echo "</select> ";
}
		

?>
		
		


<form method="post" action="input.proses.php?module=sirkulasi&act=insert" enctype="multipart/form-data">
<table><caption>Sirkulasi</caption>
<tr><td colspan=2><label for="_tanggalPinjam"><pre>Tanggal Pinjam</pre></label>
	<select name="_dtanggalPinjam">
	<option value="">-tgl-</option>
	<?php
	for($i=1;$i<=31;$i++){
		echo "<option value='".$i."'>$i</option>";
		}
	?>
	</select> /
	
	<?php
	$awal=1;
	$akhir=12;
	$var="_mtanggalPinjam";
	$terpilih=0;
	
	echo combonamabln($awal,$akhir,$var,$terpilih);
		
	?>
	 /
	
    <select name="_ytanggalPinjam">
	<option value="">-tahun-</option>
	<?php
	for($y=2010;$y<=date("Y");$y++){
		echo "<option value='".$y."'>$y</option>";
		}
	?>
	</select>
		
</td></tr>

<tr><td colspan=2><label for="_tanggalHarusKembali"><pre>Tanggal Harus Kembali</pre></label>
	<select name="_dtanggalHarusKembali">
	<option value="">-tgl-</option>
	<?php
	for($i=1;$i<=31;$i++){
		echo "<option value='".$i."'>$i</option>";
		}
	?>
	</select> /
	
	<?php
	$awal2=1;
	$akhir2=12;
	$var2="_mtanggalHarusKembali";
	$terpilih2=0;
	
	echo combonamabln($awal2,$akhir2,$var2,$terpilih2);
		
	?>
	 /
	
    <select name="_ytanggalHarusKembali">
	<option value="">-tahun-</option>
	<?php
	for($y=2010;$y<=date("Y");$y++){
		echo "<option value='".$y."'>$y</option>";
		}
	?>
	</select>
		
</td></tr>

<tr><td colspan=2><label for="_tanggalKembali"><pre>Tanggal Kembali</pre></label>
	<select name="_dtanggalKembali">
	<option value="">-tgl-</option>
	<?php
	for($i=1;$i<=31;$i++){
		echo "<option value='".$i."'>$i</option>";
		}
	?>
	</select> /
	
	<?php
	$awal3=1;
	$akhir3=12;
	$var3="_mtanggalKembali";
	$terpilih3=0;
	
	echo combonamabln($awal3,$akhir3,$var3,$terpilih3);
		
	?>
	 /
	
    <select name="_ytanggalKembali">
	<option value="">-tahun-</option>
	<?php
	for($y=2010;$y<=date("Y");$y++){
		echo "<option value='".$y."'>$y</option>";
		}
	?>
	</select>
		
</td></tr>
<tr><td colspan=2><label for="_tanggalKembali"><pre>ID Anggota</pre></label><input type="text" size="25" name="_IDAnggota" value=""></td></tr>
<tr><td colspan=2><label for="_tanggalKembali"><pre>ISBN</pre></label><input type="text" size="25" name="_isbn" value=""></td></tr>
<tr><td colspan=2><label for="_tanggalKembali"><pre>Denda</pre></label><input type="text" size="25" name="_denda" value=""></td></tr>
</table>
<table>
<tr><td><input class='cButton' value="Submit" type="submit"></td><td><input type=button class='cButton' value=Batal onclick=self.history.back()></td></tr>
</table>
</form>
