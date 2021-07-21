<?php
session_start();
require_once 'dashboard/config/koneksi.php';

$SessionId=session_id();
$ISBN=$_POST['ISBN'];
$Jml=$_POST['jml'];

//GET VARIABLE
$GID=$_GET['ID'];

$act=(isset($_REQUEST['act']) ) ? $_REQUEST['act'] : "";
if(isset($_POST['submit']) AND is_numeric($Jml)){
		
		//QUERY CEK DATA DI TABLE ShoppingCart UNTUK PEMBELIAN DENGAN SESSION ID SAAT INI
		$QCheckProduct=mysql_query("SELECT ISBN FROM ShoppingCart WHERE ISBN ='".$ISBN."'
									AND SessionId='".$SessionId."'");

		//CHECK JIKA BELUM MELAKUKAN PEMBELIAN
		if(!mysql_num_rows($QCheckProduct)){ 
		
			//MENAMBAHKAN DATA KE ShoppingCart TERHADAP PEMBELIAN BARU
			$Ins=mysql_query("INSERT INTO ShoppingCart (SessionId, ISBN, JumlahBeli, TanggalOrder)
								VALUES('".$SessionId."','".$ISBN."','".$Jml."','".date('Y-m-d')."')");
		
		}
		else {
			
			//MEMPERBAHARUI TABEL ShoppingCart JIKA PEMBELIAN TELAH DILAKUKAN SEBELUMNYA
			$Upd=mysql_query("UPDATE ShoppingCart SET JumlahBeli=JumlahBeli+'".$Jml."'
													WHERE SessionId='".$SessionId."'
													AND ISBN='".$ISBN."'");
		}
	
	//REDIRECT KE HALAMAN DEPAN
	echo "<meta http-equiv='refresh' content='0;url=index.php?info=InsertSuccess'>";	
	exit;	
}

elseif($act=='hapus'){

	$Del=mysql_query("DELETE FROM ShoppingCart WHERE ID='".$GID."'
						AND SessionID='".$SessionId."'");
	
	echo "<script>window.alert('Data berhasil dihapus');window.location=('index.php?v=shopping_cart')</script>";
	exit;
}

elseif($act=='update'){

	//MENGHITUNG JUMLAH DATA YANG DIINPUTKAN
	$Hit=count($_POST['ID']);
	
	for($i=1;$i<=$Hit;$i++){
	
		$Upd=mysql_query("UPDATE ShoppingCart SET JumlahBeli='".$Jml[$i]."'
							WHERE ID='".$_POST['ID'][$i]."'
									AND SessionId='".$SessionId."'");
	
	}
	
	//JIKA YANG DIPILIH TOMBOL SELESAI
	if(isset($_POST['selesai'])){
		
		//REDIRECT KE HALAMAN COMPLETE ORDER
		echo "<meta http-equiv='refresh' content='0;url=index.php?v=complete_order'>";
		exit;
	}
	//JIKA YANG DIPILIH TOMBOL LAIN SELAIN TOMBOL SELESAI
	else {
		
		//REDIRECT KE HALAMAN DEPAN
		echo "<meta http-equiv='refresh' content='0;url=index.php'>";
		exit;
	}
	

}

elseif($act=='register'){

	/*
	 * FUNGSI UNTUK MENDAPATKAN SEMUA DATA YANG ADA DI TABLE SHOPPINGCART
	 * 
	 */
	function InsertToOrder($SessionId)
	{
		$Cart=array();
		$QShoppingCart=mysql_query("SELECT * FROM ShoppingCart WHERE SessionId='".$SessionId."'");
		while($r=mysql_fetch_array($QShoppingCart)){
			$Cart[]=$r;
		}
		
		return $Cart;
	
	}
	
	//KE DEPANNYA BUKU AKAN DILANJUTKAN DENGAN SISTEM KEANGGOTAAN
	//DARI STRUKTUR TABLE YANG TERSEDIA TELAH MENDUKUNG
	
	//UNTUK MENGHINDARI DUPLICATE KEY DI USERNAME MAKA DIGUNAKAN UNIQID
	
	//INSERT MEMBER
	$InsMember=mysql_query("INSERT INTO member (username, NamaLengkap,Alamat,Provinsi,Kota,LevelMember)
							VALUES('".uniqid(9)."','".addslashes($_POST['NamaLengkap'])."','".htmlentities($_POST['Alamat'])."','".addslashes($_POST['Provinsi'])."','".addslashes($_POST['Kota'])."','Member')") OR DIE(mysql_error());

	$id_member=mysql_insert_id();
	//CREATE ID ORDER
	$InsOrder=mysql_query("INSERT INTO OrderData(id_member,TanggalOrder)
							VALUES('".$id_member."','".date('Y-m-d')."')");
	
	
	//MENDAPATKAN ID ORDER YANG TERCIPTA SECARA OTOMATIS KARENA KOLOM IDORDER AUTOINCREAMENT
	$IDOrder=mysql_insert_id();
	
	//MEMBUAT SESSION IDORDER
	$_SESSION['IdOrder']=$IDOrder;
	
	//MENDEKLARASIKAN SEBUAH VARIABLE TERHADAP FUNGSI InsertToOrder()
	$ShowCart=InsertToOrder($SessionId);
	
	//INSERT DATA INTO ORDER DETAIL
	for($i=0;$i<=count($ShowCart);$i++)
	{
	
		$Ins=mysql_query("INSERT INTO DetailOrder (IDOrder, ISBN, JumlahBeli)
								VALUE('".$IDOrder."','{$ShowCart[$i]['ISBN']}','{$ShowCart[$i]['JumlahBeli']}')");
	
	}
	
	//DELETE DATA IN SHOPPINGCART
	$Del=mysql_query("DELETE FROM ShoppingCart WHERE SessionId='".$SessionId."'");
	
	//REDIRECT KE HALAMAN SHOW ORDER
	echo "<meta http-equiv='refresh' content='0;url=index.php?v=show_order&IdOrder=".$_SESSION['IdOrder']."'>";
}

else {
	echo "Maaf, permintaan anda ditolak. Silakan ulangi lagi.";
}
?>
