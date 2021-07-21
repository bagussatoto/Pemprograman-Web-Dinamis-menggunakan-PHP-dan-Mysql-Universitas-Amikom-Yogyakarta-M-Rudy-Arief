<?php
include "../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];
$GIDProdi=$_GET['IDProdi'];

if ($module=='prodi' AND $act=='hapus'){

  
  $del=mysql_query("DELETE FROM prodi WHERE IDProdi='$GIDProdi'");
  
  header("location:../?v=$module");

}

?>
