<?php

  $p      = new Paging;
  $batas  = 16;
  $posisi = $p->cariPosisi($batas);
  
  //FILTER VARIABLE GET
  
  if(!is_numeric(isset($_GET['halaman'])) AND !is_numeric($_GET['halaman']))
  {
	 echo '<meta http-equiv="refresh" content="0;url=index.php">';
	exit;
  }
  
echo "<table align='center'>";
$i=0;
$kolom=4;

	
			if($i>=$kolom){
			echo "
			<tr>
			";
			$i=0;
			}
			
		echo "<td align='center' width='150'>
		
		
		if(file_exists($FileGambar)){
			echo "<a href='?v=show_product_detail&id=$ISBN'><img src='$FileGambar' alt='$Judul' width='100' height='150'\></a><br />";
		}
		
echo "</table>";

	$jmldata = mysql_num_rows(mysql_query("SELECT ISBN, judul, fileGambar, harga
								FROM buku"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($hal, $jmlhalaman);

    echo "<div id=paging>Hal: $linkHalaman</div><br>";

	if($_GET['halaman']>$jmlhalaman)
	{
		 echo '<meta http-equiv="refresh" content="0;url=index.php">';
		exit;
	}
?>
