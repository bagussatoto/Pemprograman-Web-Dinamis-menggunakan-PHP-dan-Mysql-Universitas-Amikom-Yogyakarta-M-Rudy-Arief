<script type="text/javascript">
$(document).ready(function () {
    $("#form").validate({
        rules: {
            _isbn: {
                required: true,
                minlength:2
            },
            _IDPenerbit: {
                required: true
            },
            _judul: {
                required: true,
                minlength:4
            },
            _nomorEdisi: {
                required: true,
                number:true
            },
            _copyright: {
                required: true,
                number:4
            },
            _deskripsi: {
                required: true,
                minlength:10,
                maxlength:100
            },
            _harga: {
                required: true,
                number:true
            },
            image: {
                accept:"jpg,jpeg,png"
            },
            body1: {
                required: true,
            },
            tick: "required",
            agree: "required"
        },
        messages:{
			image: {
				accept: "Gambar yang diizinkan jpg, jpeg atau png."
			}
		},
        success: function(label) {
			label.text('OK').addClass('valid');
		}
    });
});
</script>
<?php
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
  
    $tampil = mysql_query("SELECT * FROM buku b,penerbit p
							WHERE b.IDPenerbit=p.IDPenerbit 
							ORDER BY b.isbn ASC
							LIMIT $posisi, $batas");
  	$get_ang=mysql_num_rows($tampil);
	  
//VARIABLE GET
$act=(isset($_REQUEST['act']) ) ? $_REQUEST['act'] : "";
switch($act){	  
	default:
    echo "<input type=button class='cButton' value='Tambah' onclick=\"window.location.href='?v=buku&act=input';\">";
    if($get_ang){
		echo" <table  align='center' width='610'>
          <tr bgcolor='#92a751'><th>No</th><th>ISBN</th><th>Penerbit</th><th>Judul</th><th>Harga</th><th>Aksi</th></tr>";
          
    $no =1+$posisi;
    while($r=mysql_fetch_array($tampil)){
	  
	  //deklarasi variable
	  $isbn=$r['isbn'];
	  $judul=$r['judul'];
	  $nomorEdisi=$r['nomorEdisi'];
	  $copyright=$r['copyright'];
	  $deskripsi=$r['deskripsi'];
	  $IDPenerbit=$r['IDPenerbit'];
	  $namaPenerbit=$r['namaPenerbit'];
	  $fileGambar='img/thumb_'.$r['fileGambar'];
	  $harga=number_format($r['harga'],2,",",".");
	  
	if($no % 2==0){
	echo "<tr bgcolor='#d8dfea'>";
	}
	else {
	echo "<tr bgcolor='#edeff4'>";
	}
	  	
      echo "<td>$no</td>
                <td>$isbn</td>
                <td>$namaPenerbit</td>
                <td>$judul</td>
                
                <td>Rp. $harga</td>
                
            </td><td><input type=button class='cButton' value='Edit' onclick=\"window.location.href='?v=buku&act=edit&isbn=$isbn';\">
                | <input type=button class='cButton' value='Hapus' 
                onclick=\"window.location.href='buku/delete.php?module=buku&act=hapus&isbn=$isbn'; \" > </td>
                  </tr>";
      $no++;
   
    }
     echo"</table>";
    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM buku b,penerbit p
							WHERE b.IDPenerbit=p.IDPenerbit "));
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
    
    case "input":
    require_once 'input.php';
    break;
    
    case 'edit':
    require_once 'edit.php';
    break;
}    
?>
