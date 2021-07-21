<?php
include "../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];
$GIDSirkulasi=$_GET['IDSirkulasi'];

if ($module=='sirkulasi' AND $act=='hapus'){

  
  $del=mysql_query("DELETE FROM sirkulasi WHERE IDSirkulasi='$GIDSirkulasi'");
  
  header("location:view.php");

}

?>
