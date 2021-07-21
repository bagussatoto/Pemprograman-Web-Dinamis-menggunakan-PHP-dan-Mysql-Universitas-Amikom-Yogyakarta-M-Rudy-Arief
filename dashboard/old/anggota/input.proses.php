<?php

include "../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];
$name=$_POST['_name'];
$prodi=$_POST['_idprodi'];
$kelas=$_POST['_kelas'];

if ($module=='anggota' AND $act=='insert'){
	
	if(empty($name) OR empty($prodi) OR empty($kelas)){
		
		echo "<script>window.alert('Maaf, nama, prodi dan kelas harus diisi.');
          window.location=('input.php')</script>";
    }
		
  else{
     $ins=mysql_query("INSERT INTO anggota(namaAnggota,
                                    prodi,
                                    kelas)
                                    
                             VALUES('$name',
                            		'$prodi',
                            		'$kelas')");
                            		
  header("location:view.php");                            		
}
}

?>
