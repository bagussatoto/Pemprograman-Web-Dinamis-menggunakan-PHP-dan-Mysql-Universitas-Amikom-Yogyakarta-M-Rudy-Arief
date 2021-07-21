<?php
include "../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];
$GIDAnggota=$_GET['IDAnggota'];
  
if ($module=='anggota' AND $act=='hapus'){

  
  $del=mysql_query("DELETE FROM anggota WHERE IDAnggota='$GIDAnggota'");
  
  header("location:view.php");

}

?>
