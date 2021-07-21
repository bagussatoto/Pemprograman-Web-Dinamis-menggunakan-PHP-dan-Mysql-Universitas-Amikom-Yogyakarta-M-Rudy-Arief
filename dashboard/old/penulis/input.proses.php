<?php

include "../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];
$PnamaPenulis=$_POST['_namaPenulis'];
$PalamatPenulis=$_POST['_alamatPenulis'];

if ($module=='penulis' AND $act=='insert'){
	
	
	if(empty($PnamaPenulis) OR empty($PalamatPenulis)){
		echo "<script>window.alert('Maaf, nama dan alamat harus diisi.');
          window.location=('input.php')</script>";
    }
		
		else {

     $ins=mysql_query("INSERT INTO penulis( namaPenulis,alamatPenulis)
                            VALUES('$PnamaPenulis','$PalamatPenulis')");
    
  header("location:view.php");
}
}

?>
