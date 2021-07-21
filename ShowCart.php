<?php

if($Jml){
	if($GV=='shopping_cart'){
	
		echo "
		<form action='InsertProduct.php?act=update' method='POST'>
		<table align='center' width='610' id='order-table'>
		<tr bgcolor='#92a751'><th>No</th><th>Buku</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th><th>Aksi</th></tr>";
		
		$Tot=0;
		$No=1;
		while($r=mysql_fetch_array($QShowCart)){
		$ID=$r['ID'];
		$Jml=$r['JumlahBeli'];	
		$ISBN==$r['ISBN'];
		$Harga=$r['harga'];
		$Judul=$r['judul'];
		$SubTotal=$Harga*$Jml;
		$Tot=$Tot+$SubTotal;
			
			if($No % 2==0){
			echo "<tr bgcolor='#d8dfea'>";
			}
			else {
			echo "<tr bgcolor='#edeff4'>";
			}
			
			echo "
			<td>
			<input type='hidden' name='ID[$No]' value='$ID' />
			$No</td><td>$Judul</td><td align='right'>Rp ".number_format($Harga,2,",",".")."</td>
			<td><input type='text' name='jml[$No]' value='$Jml' size='2'></td><td align='right'>Rp ".number_format($SubTotal,2,",",".")."</td>
			<td><a href=\"InsertProduct.php?act=hapus&ID=$ID\"
			OnClick=\"return confirm('Hapus $Judul?');\" title='Hapus'>Hapus</a></td></tr>";
		$No++;
		}
		
		echo "<tr bgcolor='#92a751'><th colspan='4' align='right'>Total</th><th colspan='2' align='right'>Rp ".number_format($Tot,2,",",".")."</th></tr>";
		
		echo "<tr><td colspan='3' align='right'><input type='submit' value='Beli Lagi' name='home' /></td><td colspan='3' align='right'><input type='submit' value='Selesai' name='selesai' /></td></tr>";
		echo "</table>";
		echo "</form>";
	}
	
}
else 
{
	echo '<meta http-equiv="refresh" content="0;url=index.php">';
	exit;
}
?>
