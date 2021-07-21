<?php session_start();
?>

<html>
<head>
<title>Login</title>
</head>
<body>
<form action="login.proses.php?mod=login" method="POST">
<table align="center">
<tr>
<td>Username</td><td>: <input type="text" value="" name="_username" /></td>
</tr>
<tr>
<td>Password</td><td>: <input type="password" value="" name="_pass" /></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" value="Login" name="login" /></td>
</tr>
</table>
</form>
</body>
</html>

