<div class='produk-headline'>
<?php

$QProduct=mysql_query("SELECT b.ISBN, b.judul, b.fileGambar, b.harga, b.deskripsi, b.nomorEdisi, b.copyright,
							  p.namaPenerbit
						FROM buku b, penerbit p
						WHERE 
						b.IDPenerbit=p.IDPenerbit
						AND b.ISBN='".addslashes($_GET['id'])."'") OR DIE (mysql_error());

$i=0;
$r=mysql_fetch_array($QProduct);
	
	$ISBN=$r['ISBN'];
	$Judul=$r['judul'];
	$Penerbit=$r['namaPenerbit'];
	$NomorEdisi=$r['nomorEdisi'];
	$Copyright=$r['copyright'];
	
	//FUNGSI html_entity_decode() MENGAKTIFKAN FUNGSI HTML YANG TELAH DI PARSE PADA INSERT PRODUCT DI HALAMAN ADMIN
	$Deskripsi=html_entity_decode($r['deskripsi']);
	
	$FileGambar='dashboard/img/thumb_'.$r['fileGambar'];
	$Harga=number_format($r['harga'],2,",",".");
	
			
		echo "
		<h3>$Judul</h3>";
		if(file_exists($FileGambar)){
			echo "<span class='img.alignleft'><img align='left' src='$FileGambar' alt='$judul' width='200'\></span";
		}
		else {
			echo "<span class='img.alignleft'><img align='left' src='dashboard/img/photo_not_available.jpg' width='200'></span>";
		}
		
		echo "<p>$Deskripsi </p> 
		<p>
		<pre>
		<b>Penerbit: $Penerbit </b> 
		<b>Nomor Edisi: $NomorEdisi </b> 
		<b>Copyright: $Copyright </b>
		<b>Harga Rp $Harga </b>  
		</pre>
		</p>
		";	
			
	$i++;		
			


?>
</div>
