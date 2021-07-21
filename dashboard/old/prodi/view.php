<?php

//VARIABLE ACTION
$actInput="prodi/input.proses.php";
$actEdit="prodi/edit.proses.php";
$actDelete="prodi/delete.php";

//VARIABLE GET
$view=(isset($_REQUEST['v']) ) ? $_REQUEST['v'] : "";
$act=(isset($_REQUEST['act']) ) ? $_REQUEST['act'] : "";
switch($act){
	
	default:
    $tampil = mysql_query("SELECT * FROM prodi ORDER BY IDProdi DESC");
  	$get_pen=mysql_num_rows($tampil);
	  
	  echo "
    <h2>Program Study</h2>
    <input type=button class='cButton' value='Tambah' onclick=\"window.location.href='?v=$view&act=input';\">";
	  
    if($get_pen){
		echo"<table bgcolor='#fff123'>
          <tr><th>No</th><th width='200'>Program Study</th><th>Aksi</th></tr>";
	  
    $no =1;
    while($r=mysql_fetch_array($tampil)){
      $IDProdi=$r['IDProdi'];
      $namaProdi=$r['namaProdi'];
     
      echo "<tr><td>$no</td>
                <td>$namaProdi</td>
                ";
                
     echo "</td><td><input type=button class='cButton' value='Edit' onclick=\"window.location.href='?v=prodi&act=edit&IDProdi=$IDProdi'; \">
          | <input type=button value='Hapus' 
          onclick=\"window.location.href='$actDelete?module=prodi&act=hapus&IDProdi=$IDProdi'; \" > </td>
		        </tr>";
      $no++;
    }
		echo "</table>";
    }
    
    break;
    
    //INPUT 
    
    case "input":
    require_once "input.php";
    break;
    
    case "edit":
    require_once "edit.php"; 
    break;
}
    
?>
