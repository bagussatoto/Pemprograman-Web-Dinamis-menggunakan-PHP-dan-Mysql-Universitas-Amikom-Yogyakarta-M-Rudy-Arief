<?php
include "../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

if ($module=='anggota' AND $act=='hapus'){

  $idget=$_GET['id'];
  
  $del=mysql_query("DELETE FROM anggota WHERE IDAnggota='$idget'");
  
  header("location:view.php");

}

?>
