<?php
include "../config/koneksi.php";
$module=$_GET['module'];
$act=$_GET['act'];

$PIDProdi=$_POST['_IDProdi'];
$PnamaProdi=$_POST['_namaProdi'];

if ($module=='prodi' AND $act=='update'){
	
	if(empty($PnamaProdi)){
		
		echo "<meta http-equiv='refresh' content='0,url=../?v=$module&act=edit&IDProdi=$PIDProdi&info=false'>";
	}
	else {

    $upd=mysql_query("UPDATE prodi SET namaProdi = '$PnamaProdi'
                                 WHERE IDProdi   = '$PIDProdi'");
  
 
  header("location:../?v=$module");
}
}
?>
