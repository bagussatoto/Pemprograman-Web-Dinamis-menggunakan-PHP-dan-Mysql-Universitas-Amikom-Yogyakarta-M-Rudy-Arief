<?php
include "../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];
$GIDPenerbit=$_GET['IDPenerbit'];

if ($module=='penerbit' AND $act=='hapus'){

  
  $del=mysql_query("DELETE FROM penerbit WHERE IDPenerbit='$GIDPenerbit'");
  
  header("location:../?v=penerbit&info=Success");

}

?>
