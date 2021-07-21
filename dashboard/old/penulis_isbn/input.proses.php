<?php

include "../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];
$IDPenulis=$_POST['_IDPenulis'];
$isbn=$_POST['_isbn'];

 //query dapatkan penulis
  $p_isbn=mysql_query("SELECT * FROM penulis_isbn WHERE IDPenulis=$IDPenulis AND isbn=$isbn");
  $get=mysql_num_rows($p_isbn);
  

if ($module=='penulis_isbn' AND $act=='insert'){
	
	if(empty($IDPenulis) OR empty($isbn)){
		
		echo "<script>window.alert('Maaf Penulis dan Buku harus diisi.');
          window.location=('input.php?IDP=$IDPenulis&isbn=$isbn')</script>";
    }
	
	elseif ($get){

		echo "<script>window.alert('Maaf untuk nama penulis dan buku tersebut telah ada.');
          window.location=('input.php?IDP=$IDPenulis&isbn=$isbn')</script>";
		
		
		}
		
  else{
     $ins=mysql_query("INSERT INTO penulis_isbn(IDPenulis,isbn)
                                    
                             VALUES('$IDPenulis',
                            		'$isbn')");
                            		
  header("location:view.php");                            		
}
}

?>
