<script type="text/javascript">
$(document).ready(function () {
    $("#form").validate({
        rules: {
            NamaLengkap: {
                required: true,
                minlength:2
            },
            Provinsi: {
                required: true,
                minlength:4
            },
            Kota: {
                required: true,
                minlength:4
            },
            Alamat: {
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

$CheckShopCart=mysql_query("SELECT ID FROM ShoppingCart WHERE SessionId='".$SessionId."'");

if(mysql_num_rows($CheckShopCart)){
?>
	<form id="form" name="form" action="InsertProduct.php?act=register" method="POST">
	<table width="610" align="center">
	<tr><td>Nama Lengkap</td><td><input type="text" name="NamaLengkap" value=""></td></tr>
	<tr><td>Provinsi</td><td><input type="text" name="Provinsi" ></td></tr>
	<tr><td>Kota</td><td><input type="text" name="Kota" ></td></tr>
	<tr><td>Alamat</td><td><textarea name="Alamat" cols="23" rows="5" ></textarea></td></tr>
	<tr><td colspan="2" align="right"><input type="submit" value="Pesan" name="submit"></td></tr>
	</table>
	</form>
<?php
}
else {
	echo "Opss, sepertinya anda belum melakukan pembelian.";
}

?>
