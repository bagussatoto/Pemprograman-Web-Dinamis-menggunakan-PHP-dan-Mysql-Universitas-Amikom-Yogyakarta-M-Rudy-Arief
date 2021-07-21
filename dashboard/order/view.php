<?php
//VARIABLE GET
$act=(isset($_REQUEST['act']) ) ? $_REQUEST['act'] : "";

switch($act){
	
	default:
	echo "<table align='center' width='610'>
	<tr bgcolor='#92a751'><th>No</th><th>IdOrder</th><th>Tgl</th><th>Status</th><th>Aksi</th></tr>";
	
	  $p      = new Paging_Admin;
	  $batas  = 10;
	  $posisi = $p->cariPosisi($batas);
  
	 //FILTER VARIABLE GET
	  if(!is_numeric(isset($_GET['halaman'])) AND !is_numeric($_GET['halaman']))
	  {
		echo '<meta http-equiv="refresh" content="0;url=index.php">';
		exit;
	  }
	$QOrder=mysql_query("SELECT IDOrder, TanggalOrder, StatusOrder FROM OrderData LIMIT $posisi, $batas") OR DIE(mysql_error());
	
	if(mysql_num_rows($QOrder)){
	
	$no=1+$posisi;
	while($r=mysql_fetch_array($QOrder)){
	if($no % 2==0){
	echo "<tr bgcolor='#d8dfea'>";
	}
	else {
	echo "<tr bgcolor='#edeff4'>";
	}
		echo "<td>$no</td><td>$r[IDOrder]</td><td>$r[TanggalOrder]</td><td>$r[StatusOrder]</td><td align='left'><input type='button' onclick=\"window.location.href='?v=order&act=proses&IDOrder=$r[IDOrder]';\" value='Proses'></td></tr>";
	
	$no++;
	}
	
	}
	else {
	echo "<tr><td colspan='5'>Belum ada informasi pemesanan.</td></tr>";
	}
	
	echo "</table>
	";
	 $jmldata = mysql_num_rows(mysql_query("SELECT IDOrder, TanggalOrder, StatusOrder FROM OrderData"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($hal, $jmlhalaman);

    echo "<div id=paging>Hal: $linkHalaman</div><br>";

	if($_GET['halaman']>$jmlhalaman)
	{
		 echo '<meta http-equiv="refresh" content="0;url=index.php">';
		exit;
	} 
	break;
	
	case 'proses':
	require_once 'proses.php';
	break;
	
}
?>
