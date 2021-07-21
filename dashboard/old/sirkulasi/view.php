<?php
    include "../config/koneksi.php";

    $tampil = mysql_query("SELECT a.IDAnggota,a.namaAnggota,b.isbn,b.judul,
							s.tanggalPinjam,s.tanggalHarusKembali,s.tanggalKembali,s.denda, s.IDSirkulasi
							FROM anggota a, buku b, sirkulasi s ORDER BY s.IDSirkulasi DESC");
  	$get_pen=mysql_num_rows($tampil);
	  
	  echo "<h2>Sirkulasi</h2><input type=button class='cButton' value='Tambah' onclick=\"window.location.href='input.php';\">";
	  
    if($get_pen){
		echo"<table bgcolor='#fff123'>
          <tr><th>No</th><th>Tanggal Pinjam</th><th>Tanggal Harus Kembali</th><th>Tanggal Kembali</th><th>Anggota</th><th>Buku</th><th>denda</th><th>Aksi</th></tr>";
	  
    $no =1;
    while($r=mysql_fetch_array($tampil)){
      $IDSirkulasi=$r['IDSirkulasi'];
      $tanggalPinjam=$r['tanggalPinjam'];
      $tanggalHarusKembali=$r['tanggalHarusKembali'];
      $tanggalKembali=$r['tanggalKembali'];
      $IDAnggota=$r['IDAnggota'];
      $namaAnggota=$r['namaAnggota'];
      $isbn=$r['isbn'];   
      $judul=$r['judul']; 
      $denda=$r['denda'];  
    
  
      echo "<tr><td>$no</td>
                <td>$tanggalPinjam</td>
                <td>$tanggalHarusKembali</td>
                <td>$tanggalKembali</td>
                <td>$namaAnggota</td>
                <td>$judul</td>
                <td>$denda</td>
                ";
                
     echo"</td><td><input type=button class='cButton' value='Edit' onclick=\"window.location.href='edit.php?&IDSirkulasi=$IDSirkulasi'; \">
          | <input type=button value='Hapus' 
          onclick=\"window.location.href='delete.php?module=sirkulasi&act=hapus&IDSirkulasi=$IDSirkulasi'; \" > </td>
		   </tr>";
      $no++;
    }
    
    }
    
?>
