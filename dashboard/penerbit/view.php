<script type="text/javascript">
$(document).ready(function () {
    $("#form").validate({
        rules: {
            _namaPenerbit: {
                required: true,
                minlength:2
            },
            _alamatPenerbit: {
                required: true,
                minlength:4
            },
            body1: {
                required: true,
            },
            tick: "required",
            agree: "required"
        },
        success: function(label) {
			label.text('OK').addClass('valid');
		}
    });
});
</script>
<?php
    //include "../config/koneksi.php";

//VARIABLE GET
$view=(isset($_REQUEST['v']) ) ? $_REQUEST['v'] : "";
$act=(isset($_REQUEST['act']) ) ? $_REQUEST['act'] : "";

switch($act){
	
	default:
	
	  // include "../config/koneksi.php";
	  $p      = new Paging_Admin;
	  $batas  = 10;
	  $posisi = $p->cariPosisi($batas);
  
	 //FILTER VARIABLE GET
	  if(!is_numeric(isset($_GET['halaman'])) AND !is_numeric($_GET['halaman']))
	  {
		 echo '<meta http-equiv="refresh" content="0;url=index.php">';
		exit;
	  }
  
    $tampil = mysql_query("SELECT * FROM penerbit ORDER BY IDPenerbit DESC LIMIT $posisi, $batas");
  	$get_pen=mysql_num_rows($tampil);
	  
	  echo "<input type=button class='cButton' value='Tambah' onclick=\"window.location.href='?v=penerbit&act=input';\">";
	  
    if($get_pen){
		echo"<table width='610'>
          <tr bgcolor='#92a751'><th>No</th><th width='100'>Nama</th><th width='255'>Alamat</th><th>Aksi</th></tr>";
	  
    $no =1+$posisi;
    while($r=mysql_fetch_array($tampil)){
      $IDPenerbit=$r['IDPenerbit'];
      $namaPenerbit=$r['namaPenerbit'];
      $alamatPenerbit=$r['alamatPenerbit'];   
    
	if($no % 2==0){
	echo "<tr bgcolor='#d8dfea'>";
	}
	else {
	echo "<tr bgcolor='#edeff4'>";
	}
      echo "<td>$no</td>
                <td>$namaPenerbit</td>
                <td>$alamatPenerbit</td>
                ";
                
     echo"</td><td><input type=button class='cButton' value='Edit' onclick=\"window.location.href='?v=penerbit&act=edit&IDPenerbit=$IDPenerbit'; \">
          | <input type=button value='Hapus' 
          onclick=\"window.location.href='penerbit/delete.php?module=penerbit&act=hapus&IDPenerbit=$IDPenerbit'; \" > </td>
		        </tr>";
      $no++;
    }
    
    echo "</table>";
    
    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM penerbit"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($hal, $jmlhalaman);

    echo "<div id=paging>Hal: $linkHalaman</div><br>";

	}
	
	if($_GET['halaman']>$jmlhalaman)
	{
		 echo '<meta http-equiv="refresh" content="0;url=index.php">';
		exit;
	} 
    
    break;
    
    case 'input':
    require_once 'penerbit/input.php';
    break;
    
    case 'edit':
    require_once 'penerbit/edit.php';
    break;
}    
?>
