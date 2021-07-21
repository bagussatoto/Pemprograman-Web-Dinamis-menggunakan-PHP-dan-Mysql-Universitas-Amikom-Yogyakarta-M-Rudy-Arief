<?php
include "../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];
$GIDPenulis=$_GET['IDPenulis'];

if ($module=='penulis' AND $act=='hapus'){

  
  $del=mysql_query("DELETE FROM penulis WHERE IDPenulis='$GIDPenulis'");
  
  header("location:view.php");

}

?>
