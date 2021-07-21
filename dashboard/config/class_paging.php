<?php
// class paging
class Paging{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

echo "<div class=paging><center>";

for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= "<span class=current><b>$i</b></span> ";
  }
else{
  $link_halaman .= "<span class=current><a href=$_SERVER[PHP_SELF]?halaman=$i>$i</a></span> ";
}


$link_halaman .= " ";


}
echo "</center></div>";

return $link_halaman;
}
}

class Paging_Admin{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

echo "<div class=paging><center>";

for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= "<span class=current><b>$i</b></span> ";
  }
else{
  $link_halaman .= "<span class=current><a href=$_SERVER[PHP_SELF]?v=$_GET[v]&halaman=$i>$i</a></span> ";
}


$link_halaman .= " ";


}
echo "</center></div>";

return $link_halaman;
}
}
?>
