<?php
    
    include "../config/koneksi.php"; 
    $GIDAnggota=$_GET['IDAnggota'];
    
    $edit = mysql_query("SELECT * FROM anggota WHERE IDAnggota='$GIDAnggota'");
    $r= mysql_fetch_array($edit);
    $get_ang=mysql_num_rows($edit);
    
    $IDAnggota=$r['IDAnggota'];
    $namaAnggota=$r['namaAnggota'];
    $prodi=$r['prodi'];
    $kelas=$r['kelas'];
    
	  
    $aksi="anggota/config_anggota.php";
  
    //query program jurusan
    $SqlProdi=mysql_query("SELECT * FROM prodi ORDER BY namaProdi ASC");
    $cc=mysql_num_rows($SqlProdi);

	//jika di tabel prodi belum ada isinya
    if(empty($cc)){
	  echo"Mohon inputkan dulu program jurusan <a href='prodi/input.php' title='Inputkan prodi'>disini</a>";
	  }
	
	//jika ditemukan ada baris di tabel anggota  
    elseif($get_ang){ 
    
    echo "<h1>Edit Anggota</h1><br>";
    ?>  
    
	<form method="post" action="edit.proses.php?module=anggota&act=update" enctype="multipart/form-data">
	<table>
	
	<!-- 
	Input type hidden u/ menyembunyikan form yang mempunyai nilai IDAnggota.
	-->
	<input type="hidden" name="_IDAnggota" value="<?php echo $IDAnggota;?>">
	
	<tr><td colspan=2><label><pre>Nama: *</pre></label><input name="_namaAnggota" size="25" maxlength="512" type="text" 
	value="<?php echo $namaAnggota;?>"></td></tr>

	<tr><td colspan=2><label><pre>Program Jurusan : *</pre>     
	<select name="_prodi">
	<?php 
//jika program studi di tabel anggota kosong
	if ($prodi==0){
	echo "<option value=''>Pilih Prodi...</option>";

	}
	
	while($r=mysql_fetch_array($SqlProdi)){
	
	//jika program studi ditabel anggota = di tabel prodi, maka akan langsung dipilih.
	
	if($prodi==$r['IDProdi']){
		echo "<option value='".$r['IDProdi']."' selected>".$r['namaProdi']."</option>";
		}
	else {
		echo "<option value='".$r['IDProdi']."' >".$r['namaProdi']."</option>";
		}	
	
	}
	?>		
	</select>
	</td></tr>
	<tr><td colspan=2><label><pre>Kelas : *</pre></label><input name="_kelas" size="25" maxlength="512" type="text"
	value="<?php echo $kelas;?>"></td></tr>
	<tr><td><input class='cButton' value="Update" type="submit"></td><td><input type=button class='cButton' value=Batal onclick=self.history.back()></td></tr>
	</table>
	</form>
      
    <?php  
    }
    
    
     else
    {
		echo"Maaf, kami tidak menemukan data yang akan anda edit, <br>Silakan ulangi lagi.";
		}

?>		 
