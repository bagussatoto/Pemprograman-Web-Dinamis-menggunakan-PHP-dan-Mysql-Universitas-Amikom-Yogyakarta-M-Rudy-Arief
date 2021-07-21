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
$Pharga=addslashes($_POST['_harga']);

//baca nama gambar
$image=stripslashes($_FILES['image']['name']);

//cek isbn
	$cisbn=mysql_num_rows(mysql_query("SELECT isbn FROM buku WHERE isbn='$Pisbn'"));

if ($module=='buku' AND $act=='insert'){
	
	if(empty($Pisbn) OR empty($Pjudul)OR empty($PnomorEdisi)OR empty($Pcopyright)OR empty($Pdeskripsi)OR empty($PIDPenerbit)OR empty($Pharga)){
		
		echo "<script>window.alert('Maaf,form dengan tanda * wajib diisi.');
          window.location=('../?v=buku&act=input')</script>";
    }
    
    elseif($cisbn){
		echo "Maaf, isbn tersebut telah ada.";
		}
   
   elseif($image) {
	   require_once "input.proses.image.php";
	   } 
		
  else{
     
     $ins=mysql_query("INSERT INTO buku(isbn,
                                    judul,
                                    nomorEdisi,
                                    copyright,
                                    deskripsi,
                                    IDPenerbit,
                                    harga)
                                    
                             VALUES('$Pisbn',
                            		'$Pjudul',
                            		'$PnomorEdisi',
                            		'$Pcopyright',
                            		'$Pdeskripsi',
                            		'$PIDPenerbit',
                            		'$Pharga')");
                            		
  header("location:../?v=buku");                            		
}
}

?>
