<?php
include "../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];
$Gisbn=$_GET['isbn'];
  
if ($module=='buku' AND $act=='hapus'){

  
  $del=mysql_query("DELETE FROM buku WHERE isbn='$Gisbn'");
  
  header("location:../?v=buku&info=Success");

}

?>
