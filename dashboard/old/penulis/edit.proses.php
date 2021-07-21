<?php
include "../config/koneksi.php";
$module=$_GET['module'];
$act=$_GET['act'];

$PIDPenulis=$_POST['_IDPenulis'];
$PnamaPenulis=$_POST['_namaPenulis'];
$PalamatPenulis=$_POST['_alamatPenulis'];

if ($module=='penulis' AND $act=='update'){
	
	if(empty($PnamaPenulis) OR empty($PalamatPenulis)){
		
		echo "<meta http-equiv='refresh' content='0,url=edit.php?IDPenulis=$PIDPenulis&info=false'>";
		}
	else {

    $upd=mysql_query("UPDATE penulis SET namaPenulis = '$PnamaPenulis',
                                   alamatPenulis  = '$PalamatPenulis'
                                   
                             WHERE IDPenulis   = '$PIDPenulis'");
  
 
  header("location:view.php");
}
}
?>
