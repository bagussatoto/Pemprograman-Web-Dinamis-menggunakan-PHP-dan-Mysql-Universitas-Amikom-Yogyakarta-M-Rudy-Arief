<?php

$GIDOrder=$_SESSION['IdOrder'];
$DataStatus=array("baru","lunas","terkirim");

$QOrder=mysql_query("SELECT o.IDOrder, o.TanggalOrder, o.StatusOrder,
							d.JumlahBeli, 
							b.ISBN, b.judul, b.harga,
							m.NamaLengkap, m.Alamat, m.Provinsi, m.Kota
							FROM OrderData o, DetailOrder d, member m, buku b
							WHERE
							o.IDOrder=d.IDOrder
							AND m.id_member=o.id_member
							AND LevelMember='member'
							AND d.ISBN=b.ISBN
							AND o.IDOrder='".$GIDOrder."'
							") OR DIE(mysql_error());
	
							
if(mysql_num_rows($QOrder)){
	echo "<table align='center' width='610'>
	<tr  bgcolor='#d8dfea'><th colspan='6'>Informasi Produk</th></tr>
	<tr bgcolor='#92a751'><th>No</th><th>ISBN</th><th>Buku</th><th>Harga</th><th>Jml</th><th>Subtotal</th>
	</tr>";
	$Tot=0;
	$No=1;
	while($r=mysql_fetch_array($QOrder)){
	$IDOrder=$r['IDOrder'];
	$TglOrder=$r['TanggalOrder'];
	$StatusOrder=$r['StatusOrder'];
	$JmlBeli=$r['JumlahBeli'];
	$ISBN=$r['ISBN'];
	$Harga=$r['harga'];
	$Judul=$r['judul'];
	$NamaLengkap=$r['NamaLengkap'];
	$Alamat=$r['Alamat'];
	$Provinsi=$r['Provinsi'];
	$Kota=$r['Kota'];
	$SubTotal=$Harga*$JmlBeli;
	$Tot=$Tot+$SubTotal;
	
	if($No % 2==0){
	echo "<tr bgcolor='#d8dfea'>";
	}
	else {
	echo "<tr bgcolor='#edeff4'>";
	}
	echo "<td>$No</td><td>$ISBN</td><td>$Judul</td><td>Rp ".number_format($Harga,2,",",".")."</td><td>$JmlBeli</td><td align='right'>Rp ".number_format
	($SubTotal,2,",",".")."</td></tr>";
	
	$No++;
	}
	echo "<tr bgcolor='#92a751'><th colspan='4' align='right'>Total</th><th colspan='2' align='right'>Rp ".number_format($Tot,2,",",".")."</th></tr>";
	echo "<tr><td colspan='6' height='20'>&nbsp;</td></tr>
	<tr bgcolor='#d8dfea'><th colspan='6'>Informasi Pembeli</th></tr>
	<tr bgcolor='#edeff4'><td colspan='3'>ID Order</td><td colspan='3'>$IDOrder</td></tr>
	<tr bgcolor='#d8dfea'><td colspan='3'>Tanggal</td><td colspan='3'>$TglOrder</td></tr>
	<tr bgcolor='#edeff4'><td colspan='3'>Nama</td><td colspan='3'>$NamaLengkap</td></tr>
	<tr bgcolor='#edeff4'><td colspan='3'>Provinsi</td><td colspan='3'>$Provinsi</td></tr>
	<tr bgcolor='#edeff4'><td colspan='3'>Kota</td><td colspan='3'>$Kota</td></tr>
	<tr bgcolor='#d8dfea'><td colspan='3'>Alamat</td><td colspan='3'>$Alamat</td></tr>
	<tr bgcolor='#edeff4'><td colspan='3'>Status</td><td colspan='3'>
	
	<form action='$_SERVER[PHP_SELF]?v=order&act=proses' method='POST'>
	<input type='hidden' name='IDOrder' value='$IDOrder'>
	";
	
	foreach($DataStatus AS $Key=>$Val){
	
			if($StatusOrder==$Val){
				echo "".strtoupper($Val)."";
			}
	
	}
	
	echo "</td></tr>
	</table>
	
	";
}
else
{
	echo '<meta http-equiv="refresh" content="0;url=index.php">';
	exit;
}
?>
