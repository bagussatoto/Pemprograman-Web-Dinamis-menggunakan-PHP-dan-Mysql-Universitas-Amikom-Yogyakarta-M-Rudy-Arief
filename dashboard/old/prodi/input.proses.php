<?php

include "../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];
$PnamaProdi=$_POST['_namaProdi'];

if ($module=='prodi' AND $act=='insert'){
	
	
	if(empty($PnamaProdi)){
		echo "<script>window.alert('Maaf, program study harus diisi.');
          window.location=('../?v=prodi&act=input')</script>";
    }
		
		else {

     $ins=mysql_query("INSERT INTO prodi( namaProdi)
                            VALUES('$PnamaProdi')");
    
  header("location:../?v=$module");
}
}

?>
