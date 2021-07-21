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

	$GIDSirkulasi=$_GET['IDSirkulasi'];
		$sir=mysql_query("SELECT day(tanggalPinjam) AS dTP, month(tanggalPinjam) AS mTP, year(tanggalPinjam) AS yTP,
								 day(tanggalHarusKembali) AS dTHK, month(tanggalHarusKembali) AS mTHK, year(tanggalHarusKembali) AS yTHK,
								 day(tanggalKembali) AS dTK, month(tanggalKembali) AS mTK, year(tanggalKembali) AS yTK,
								 IDAnggota, isbn, denda, IDSirkulasi	
								 FROM sirkulasi WHERE IDSirkulasi='$GIDSirkulasi'");
		$get=mysql_num_rows($sir);
		$r=mysql_fetch_array($sir);
	
	if($sir){
?>
		
		


<form method="post" action="edit.proses.php?module=sirkulasi&act=update" enctype="multipart/form-data">
	<input type="hidden" name="_IDSirkulasi" value="<?php echo $r['IDSirkulasi'];?>">

<table><caption>Sirkulasi</caption>
<tr><td colspan=2><label for="_tanggalPinjam"><pre>Tanggal Pinjam</pre></label>
	<select name="_dtanggalPinjam">
	<option value="">-tgl-</option>
	<?php
	for($i=1;$i<=31;$i++){
		if($r['dTP']==$i){
			echo "<option value='".$i."' selected>$i</option>";
			}
		echo "<option value='".$i."'>$i</option>";
		}
	?>
	</select> /
	
	<?php
	$awal=1;
	$akhir=12;
	$var="_mtanggalPinjam";
	$terpilih=$r['mTP'];
	
	echo combonamabln($awal,$akhir,$var,$terpilih);
		
	?>
	 /
	
    <select name="_ytanggalPinjam">
	<option value="">-tahun-</option>
	<?php
	for($y=2010;$y<=date("Y");$y++){
		if($r['yTP']==$y){

		echo "<option value='".$y."' selected>$y</option>";
			
			}
		else {	
		echo "<option value='".$y."'>$y</option>";
		}
		}
	?>
	</select>
		
</td></tr>

<tr><td colspan=2><label for="_tanggalHarusKembali"><pre>Tanggal Harus Kembali</pre></label>
	<select name="_dtanggalHarusKembali">
	<option value="">-tgl-</option>
	<?php
	for($i=1;$i<=31;$i++){
		if($r['dTHK']==$i){

		echo "<option value='".$i."' selected>$i</option>";
		
		}
		else {
		
		echo "<option value='".$i."'>$i</option>";
		
			}
	}
	?>
	</select> /
	
	<?php
	$awal=1;
	$akhir=12;
	$var="_mtanggalHarusKembali";
	$terpilih=$r['mTHK'];;
	
	echo combonamabln($awal,$akhir,$var,$terpilih);
		
	?>
	 /
	
    <select name="_ytanggalHarusKembali">
	<option value="">-tahun-</option>
	<?php
	for($y=2010;$y<=date("Y");$y++){
		
		if($r['yTHK']==$y){
		
		echo "<option value='".$y."' selected>$y</option>";
			
			}
		else {
		
		echo "<option value='".$y."'>$y</option>";
		
		}
	}
	?>
	</select>
		
</td></tr>

<tr><td colspan=2><label for="_tanggalKembali"><pre>Tanggal Kembali</pre></label>
	<select name="_dtanggalKembali">
	<option value="">-tgl-</option>
	<?php
	for($i=1;$i<=31;$i++){
		if($r['dTK']==$i){
		
		echo "<option value='".$i."' selected>$i</option>";
			
			}
		else {	
		echo "<option value='".$i."'>$i</option>";
		}
	}
	?>
	</select> /
	
	<?php
	$awal=1;
	$akhir=12;
	$var="_mtanggalKembali";
	$terpilih=$r['mTK'];
	
	echo combonamabln($awal,$akhir,$var,$terpilih);
		
	?>
	 /
	
    <select name="_ytanggalKembali">
	<option value="">-tahun-</option>
	<?php
	for($y=2010;$y<=date("Y");$y++){
			if($r['yTK']==$y){
	
			echo "<option value='".$y."' selected>$y</option>";
				
				}
			else {
			
			echo "<option value='".$y."'>$y</option>";
			
			}
	}
	?>
	</select>
		
</td></tr>
<tr><td colspan=2><label for="_tanggalKembali"><pre>ID Anggota</pre></label><input type="text" size="25" name="_IDAnggota" value="<?php echo $r['IDAnggota'];?>"></td></tr>
<tr><td colspan=2><label for="_tanggalKembali"><pre>ISBN</pre></label><input type="text" size="25" name="_isbn" value="<?php echo $r['isbn'];?>"></td></tr>
<tr><td colspan=2><label for="_tanggalKembali"><pre>Denda</pre></label><input type="text" size="25" name="_denda" value="<?php echo $r['denda'];?>"></td></tr>
</table>
<table>
<tr><td><input class='cButton' value="Submit" type="submit"></td><td><input type=button class='cButton' value=Batal onclick=self.history.back()></td></tr>
</table>
</form>

<?php
	}
?>
	
