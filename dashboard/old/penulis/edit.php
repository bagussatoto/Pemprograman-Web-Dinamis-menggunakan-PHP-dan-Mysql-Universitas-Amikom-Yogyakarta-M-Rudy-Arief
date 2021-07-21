<?php
    
    include "../config/koneksi.php"; 
    $GIDPenulis=$_GET['IDPenulis'];
    
    $edit = mysql_query("SELECT * FROM penulis WHERE IDPenulis='$GIDPenulis'");
    $r    = mysql_fetch_array($edit);
    $get_pen=mysql_num_rows($edit);
    
    $IDPenulis=$r['IDPenulis'];
    $namaPenulis=$r['namaPenulis'];
    $alamatPenulis=$r['alamatPenulis'];
    
	if($get_pen){
	
	//start dapatkan informasi kesalahan
	$info=(isset($_REQUEST['info']) ) ? $_REQUEST['info'] : "";
	
	if($info=='false'){
		echo "Maaf, terjadi kesalahan.";
		}
	//end dapatkan informasi kesalahan
		
    echo "<h1>Edit Penulis</h1><br>
      ";
    ?>  
    
    <form method="post" action="edit.proses.php?module=penulis&act=update" enctype="multipart/form-data">
	<table>
    <input type="hidden" name="_IDPenulis" value="<?php echo $IDPenulis;?>">
    <tr><td colspan=2><label for="namaPenulis"><pre>Nama : *</pre></label><input name="_namaPenulis" <?php echo "value='".$namaPenulis."' ";?> size="25" maxlength="512" type="text"></td></tr>
    <tr><td colspan=2><label for="alamatPenulis"><pre>Alamat: *</pre></label><textarea name="_alamatPenulis" cols="39" rows="5"><?php echo $alamatPenulis;?> </textarea></td></tr>

    </table>
    <table>
    <tr><td><input  value="Update" class="cButton" type="submit"></td> <td><input type=button class="cButton" value="Batal" onclick=self.history.back()></td></tr>
    </table>
    </form>
      
    <?php  
    }
    else
    {
		echo"Maaf, kami tidak menemukan data yang akan anda edit, <br>Silakan ulangi lagi.";
		}

?>		 
