<?php
include "../config/koneksi.php";
$module=$_GET['module'];
$act=$_GET['act'];
$PIDPenerbit=$_POST['_IDPenerbit'];
$PnamaPenerbit=$_POST['_namaPenerbit'];
$PalamatPenerbit=$_POST['_alamatPenerbit'];

if ($module=='penerbit' AND $act=='edit'){
	
	
	
	if(empty($PalamatPenerbit) OR empty($PnamaPenerbit)){
		echo "<script>window.alert('Maaf, semua form harus diisi.');
		window.location=('../?v=$module&act=$act&IDPenerbit=$PIDPenerbit&info=FormIncomplete')</script>";
		}
	
	else {

    $up=mysql_query("UPDATE penerbit SET namaPenerbit = '$PnamaPenerbit',
                                   alamatPenerbit  = '$PalamatPenerbit'
                                   
                             WHERE IDPenerbit   = '$PIDPenerbit'");
  
 
	header("location:../?v=$module&act=$act&IDPenerbit=$PIDPenerbit&info=Success");
	}
}
?>
