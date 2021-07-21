<?php
include "../config/koneksi.php";
$module=$_GET['module'];
$act=$_GET['act'];
$PIDPenulis=$_POST['_IDPenulis'];
$Pisbn=$_POST['_isbn'];
	
	
	//skrip cek ketersediaan penulis dan buku
 $edit = mysql_query("SELECT p.IDPenulis,p.namaPenulis,b.isbn,b.judul FROM penulis p, buku b,
    penulis_isbn pi WHERE p.IDPenulis=pi.IDPenulis AND b.isbn=pi.isbn
    AND pi.IDPenulis='$PIDPenulis' AND pi.isbn='$Pisbn'");
 $get=mysql_num_rows($edit);
 

if ($module=='penulis_isbn' AND $act=='update'){
	
	
	if(empty($PIDPenulis) OR empty($Pisbn)){
		header("location:edit.php?idp=".$PIDPenulis."&isbn=".$Pisbn."");
		}
		
    elseif($get) {

    $pen=mysql_query("UPDATE penulis SET IDPenulis= '$PIDPenulis',
                                          isbn= '$Pisbn'
                                   
                             WHERE IDPenulis= '$PIDPenulis' AND isbn='$Pisbn'");
  
 
  header("location:view.php");
}
	else {
		echo "sorry";
		}
}
?>
