<?php
include "../config/koneksi.php";
$module=$_GET['module'];
$act=$_GET['act'];

$PIDAnggota=$_POST['_IDAnggota'];
$PnamaAnggota=$_POST['_namaAnggota'];
$Pprodi=$_POST['_prodi'];
$Pkelas=$_POST['_kelas'];

if ($module=='anggota' AND $act=='update'){
	
	
	
	if(empty($PnamaAnggota) OR empty($Pprodi) OR empty($Pkelas)){
		header("location:edit.php?IDAnggota=$PIDAnggota");
		}
	
	else {

    $up=mysql_query("UPDATE anggota SET namaAnggota = '$PnamaAnggota',
                                    prodi  = '$Pprodi',
									kelas='$Pkelas'
                                   
                             WHERE IDAnggota   = '$PIDAnggota'");
  
 
  header("location:view.php");
}
}
?>
