<?php

include "../config/koneksi.php";
include "../config/fungsi_thumb.php";

$module=$_GET['module'];
$act=$_GET['act'];
$Pisbn=addslashes($_POST['_isbn']);
$Pjudul=addslashes($_POST['_judul']);
$PnomorEdisi=addslashes($_POST['_nomorEdisi']);
$Pcopyright=addslashes($_POST['_copyright']);
$Pdeskripsi=htmlentities($_POST['_deskripsi']);
$PIDPenerbit=addslashes($_POST['_IDPenerbit']);
//$Pgambar=$_POST['_gambar'];
$Pharga=addslashes($_POST['_harga']);
//baca nama gambar
$image=stripslashes($_FILES['image']['name']);

if ($module=='buku' AND $act=='update'){
	
	if(empty($Pisbn) OR empty($Pjudul)OR empty($PnomorEdisi)OR empty($Pcopyright)OR empty($Pdeskripsi)OR empty($PIDPenerbit)OR empty($Pharga)){
		
		echo "<script>window.alert('Maaf,form dengan tanda * wajib diisi.');
          window.location=('../?v=buku&act=edit&isbn=$Pisbn&info=FormIncomplete')</script>";
    }
   elseif($image){
	   require_once "edit.proses.image.php";
	   } 
		
  else{
     
     $upd=mysql_query("UPDATE buku SET 
									judul='$Pjudul',
                            		nomorEdisi='$PnomorEdisi',
                            		copyright='$Pcopyright',
                            		deskripsi='$Pdeskripsi',
                            		IDPenerbit='$PIDPenerbit',
                            		harga='$Pharga'
                            		
                            		WHERE isbn='$Pisbn'
                            		");
                            		
  header("location:../?v=buku&act=edit&isbn=$Pisbn&info=Success");                            		
}
}

?>
