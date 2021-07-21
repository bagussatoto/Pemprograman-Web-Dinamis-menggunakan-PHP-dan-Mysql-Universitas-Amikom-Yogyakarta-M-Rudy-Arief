<?php
    //include "../config/koneksi.php"; 
    $GIDPenerbit=$_GET['IDPenerbit'];
    
    $edit = mysql_query("SELECT * FROM penerbit WHERE IDPenerbit='$GIDPenerbit'");
    $r    = mysql_fetch_array($edit);
    $get_pen=mysql_num_rows($edit);
    
    $IDPenerbit=$r['IDPenerbit'];
    $namaPenerbit=$r['namaPenerbit'];
    $alamatPenerbit=$r['alamatPenerbit'];
    
	if($get_pen){
   
    ?>  
    
    <form method="post" id="form" name="form" action="penerbit/edit.proses.php?module=penerbit&act=edit" enctype="multipart/form-data">
		<?php
			echo "<input type=hidden name='_IDPenerbit' value='$IDPenerbit'>
			";
			?>
    <table width='610'>
    <tr><td>Nama : *</td><td><input name="_namaPenerbit"  <?php echo "value='".$namaPenerbit."' ";?> size="65" maxlength="512" type="text"></td></tr>
    <tr><td>Alamat: *</td><td><textarea name="_alamatPenerbit" cols="50" rows="10" ><?php echo $alamatPenerbit;?></textarea></td></tr>

    <tr><td><input  value="Update" class="cButton" type="submit"></td> <td><input type="button"  value="Batal" onclick=self.history.back()></td></tr>
    </table>
    </form>
      
    <?php  
    }
    else{
		echo"Maaf, kami tidak menemukan data yang akan anda edit, <br>Silakan ulangi lagi.";
		}

?>		 
