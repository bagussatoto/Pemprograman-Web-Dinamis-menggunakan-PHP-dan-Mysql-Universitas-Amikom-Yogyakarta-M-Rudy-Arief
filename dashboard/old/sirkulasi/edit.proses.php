<?php

include "../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];
$PIDSirkulasi=$_POST['_IDSirkulasi'];
$PtanggalPinjam="$_POST[_ytanggalPinjam]-$_POST[_mtanggalPinjam]-$_POST[_dtanggalPinjam]";
$PtanggalHarusKembali="$_POST[_ytanggalHarusKembali]-$_POST[_mtanggalHarusKembali]-$_POST[_dtanggalHarusKembali]";
$PtanggalKembali="$_POST[_ytanggalKembali]-$_POST[_mtanggalKembali]-$_POST[_dtanggalKembali]";
$PIDAnggota=$_POST['_IDAnggota'];
$Pisbn=$_POST['_isbn'];
$Pdenda=$_POST['_denda'];

//cek anggota
	$ang=mysql_num_rows(mysql_query("SELECT IDAnggota FROM anggota WHERE IDAnggota='$PIDAnggota'"));
//cek isbn
	$buku=mysql_num_rows(mysql_query("SELECT isbn FROM buku WHERE isbn='$Pisbn'"));
	

if ($module=='sirkulasi' AND $act=='update'){
	
	//jika tanggal pinjam tidak lengkap diisi
	if(empty($_POST['_dtanggalPinjam']) OR empty($_POST['_mtanggalPinjam']) OR empty($_POST['_ytanggalPinjam'])){
		echo "<script>window.alert('Maaf, tanggal pinjam belum lengkap.');
          window.location=('input.php')</script>";
    }
    //jika tanggal harus kembali tidak lengkap diisi
	elseif(empty($_POST['_dtanggalHarusKembali']) OR empty($_POST['_mtanggalHarusKembali']) OR empty($_POST['_ytanggalHarusKembali'])){
		echo "<script>window.alert('Maaf, tanggal harus kembali belum lengkap.');
          window.location=('input.php')</script>";
    }
	//jika tanggal kembali tidak lengkap diisi
	elseif(empty($_POST['_dtanggalKembali']) OR empty($_POST['_mtanggalKembali']) OR empty($_POST['_ytanggalKembali'])){
		echo "<script>window.alert('Maaf, tanggal kembali belum lengkap.');
          window.location=('input.php')</script>";
    }
    
    elseif(empty($PIDAnggota) OR empty($Pisbn) OR empty($Pdenda)){
		echo "<script>window.alert('Maaf, form belum lengkap.');
          window.location=('input.php')</script>";
		}
	elseif(!$ang OR !$buku){
		echo "<script>window.alert('Maaf, ID Anggota atau isbn tidak ditemukan.');
          window.location=('input.php')</script>";
		
		}
	
	else {

     $upd=mysql_query("UPDATE sirkulasi SET tanggalPinjam='$PtanggalPinjam',
											 tanggalHarusKembali='$PtanggalHarusKembali',
											 tanggalKembali='$PtanggalKembali',
											 IDAnggota='$PIDAnggota',
											 isbn='$Pisbn',
											 denda='$Pdenda'
											 
											 WHERE IDSirkulasi='$PIDSirkulasi'
											 ");
    
  header("location:view.php");
}
}

?>
