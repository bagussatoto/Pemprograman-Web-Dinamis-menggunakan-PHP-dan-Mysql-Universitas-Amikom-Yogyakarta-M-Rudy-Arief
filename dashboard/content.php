<?php

if($_SESSION['user'] AND $_SESSION['pass']){

	if($_GET['v']=='home'){
	
		echo "<h1>Selamat Datang di Menu Admin</h1>";
	
	}
	elseif($_GET['v']=='buku'){
	
		require_once "buku/view.php";
	
	}
	
	elseif($_GET['v']=='penerbit'){
	
		require_once "penerbit/view.php";
	
	}
	elseif($_GET['v']=='order'){
	
		require_once "order/view.php";
	
	}
	
}

else {

header('location:../login/login.php');
	
}
?>
