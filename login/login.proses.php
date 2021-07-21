<?php
session_start();
require_once "../dashboard/config/koneksi.php";
//Variable
$user=$_POST['_username'];
$pass=md5($_POST['_pass']);

if($_GET['mod']=='login'){
	$Q=mysql_query("SELECT username, password FROM member WHERE username='".$user."'
										AND password='".$pass."' AND LevelMember='admin'");
	$r=mysql_fetch_array($Q);
	//cek jika data ketemu
	if(mysql_num_rows($Q)){
		//CREATE SESSION
		$_SESSION['user']=$r['username'];
		$_SESSION['pass']=$r['password'];
	
	header('location:../dashboard/index.php?v=home');	
	}
	
	else {
	
	header('location:login.php');	
	
	}
	
}

?>
