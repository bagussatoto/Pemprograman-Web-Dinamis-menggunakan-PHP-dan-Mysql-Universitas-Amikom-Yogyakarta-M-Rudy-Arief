<?php
    
    include "../config/koneksi.php";  
    $GIDPenulis=$_GET['idp'];
    $Gisbn=$_GET['isbn'];
    
    $edit = mysql_query("SELECT p.IDPenulis,p.namaPenulis,b.isbn,b.judul FROM penulis p, buku b,
    penulis_isbn pi WHERE p.IDPenulis=pi.IDPenulis AND b.isbn=pi.isbn
    AND pi.IDPenulis='$GIDPenulis' AND pi.isbn='$Gisbn'");
    $r= mysql_fetch_array($edit);
    $get=mysql_num_rows($edit);
    
    $IDPenulis=$r['IDPenulis'];
    $isbn=$r['isbn'];
    $namaPenulis=$r['namaPenulis'];
    $judul=$r['judul'];
	

    $aksi="config.php";
  
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

    elseif($get){ 
    echo "<h1>Edit Penulis ISBN</h1><br>
      ";
    ?>  
    
		  <form method="post" action="edit.proses.php?module=penulis_isbn&act=update" enctype="multipart/form-data">
	
	  <table>
      <tr><td colspan=2><label><pre>Penulis : *</pre></label>
      <select name="_IDPenulis">
      
      <?php
			if($IDPenulis==''){
				echo "<option value=''>-Pilih Penulis-</option>";
				}
			while($r=mysql_fetch_array($penulis)){
				
				if($IDPenulis==$r['IDPenulis']){
					echo "<option value='".$r['IDPenulis']."' selected>".$r['namaPenulis']."</option>";
					}
				else {
					echo "<option value='".$r['IDPenulis']."'>".$r['namaPenulis']."</option>";
					}	
				
				}	
      ?>
      
      </select>
      
      
      </td></tr>  
      
      <tr><td colspan=2><label><pre>Buku : *</pre></label>
      <select name="_isbn">
      
      <?php
			if($isbn==''){
				echo "<option value=''>-Pilih Buku-</option>";
				}
			while($r=mysql_fetch_array($buku)){
				
				if($isbn==$r['isbn']){
					echo "<option value='".$r['isbn']."' selected>".$r['judul']."</option>";
					}
				else {
					echo "<option value='".$r['isbn']."'>".$r['judul']."</option>";
					}	
				
				}	
      ?>
      
      </select>
      
      
      </td></tr>  
      
      
      </table>
      <table>
      <tr><td><input value="Submit" type="submit"></td> <td><input type=button value="Batal" onclick=self.history.back()></td></tr>
      </table>
      </form>
      
    <?php  
    }
    
    
    else
    {
		echo"Maaf, kami tidak menemukan data yang akan anda edit, <br>Silakan ulangi lagi.";
		}

?>		 
