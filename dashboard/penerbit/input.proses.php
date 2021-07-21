<?php

include "../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];
$PnamaPenerbit=$_POST['_namaPenerbit'];
$PalamatPenerbit=$_POST['_alamatPenerbit'];

if ($module=='penerbit' AND $act=='input'){
	
	
	if(empty($PnamaPenerbit) OR empty($PalamatPenerbit)){
		echo "<script>window.alert('Maaf, nama dan alamat harus diisi.');
          window.location=('../?v=$module&act=$act&info=FormIncomplete')</script>";
    }
		
		else {

     $ins=mysql_query("INSERT INTO penerbit( namaPenerbit,alamatPenerbit)
                            VALUES('$PnamaPenerbit','$PalamatPenerbit')");
    
  header("location:../?v=$module&info=Success");
}
}

?>
