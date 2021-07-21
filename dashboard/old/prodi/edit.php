<?php
    $GIDProdi=$_GET['IDProdi'];
    
    $edit = mysql_query("SELECT * FROM prodi WHERE IDProdi='$GIDProdi'");
    $r    = mysql_fetch_array($edit);
    $get=mysql_num_rows($edit);
    
    $IDProdi=$r['IDProdi'];
    $namaProdi=$r['namaProdi'];
        
	if($get){
	
	//start dapatkan informasi kesalahan
	$info=(isset($_REQUEST['info']) ) ? $_REQUEST['info'] : "";
	
	if($info=='false'){
		echo "Maaf, terjadi kesalahan.";
		}
	//end dapatkan informasi kesalahan
		
    echo "<h1>Edit Program Study</h1><br>
      ";
    ?>  
    
    <form method="post" action="<?php echo $actEdit;?>?module=prodi&act=update" enctype="multipart/form-data">
	<table>
    <input type="hidden" name="_IDProdi" value="<?php echo $IDProdi;?>">
    <tr><td colspan=2><label for="namaProdi"><pre>Program Study: *</pre></label><input name="_namaProdi" <?php echo "value='".$namaProdi."' ";?> size="25" maxlength="512" type="text"></td></tr>
    
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
