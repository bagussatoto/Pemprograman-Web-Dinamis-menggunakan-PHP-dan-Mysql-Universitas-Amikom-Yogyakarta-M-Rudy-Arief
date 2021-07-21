
<form method="post" action="<?php echo $actInput;?>?module=prodi&act=insert" enctype="multipart/form-data">
<table><caption>Tambah Program Study</caption>
<tr><td colspan=2><label for="namaProdi"><pre>Program Study</pre></label><input name="_namaProdi" size="25" maxlength="512" type="text"></td></tr>
</table>
<table>
<tr><td><input class='cButton' value="Submit" type="submit"></td><td><input type=button class='cButton' value=Batal onclick=self.history.back()></td></tr>
</table>
</form>
