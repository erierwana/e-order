<?php
	include("../include/lib_func.php");
	$username=$_POST['username'];
	$userpass=$_POST['userpass'];
	$link=koneksi_db();
	$sql="select * from admin where username ='$username' and userpass=password('$userpass')";
	$res=mysqli_query($link,$sql);
	if(mysqli_num_rows($res)==1){ // jika username dan pass benar
		$data=mysqli_fetch_array($res);
		session_start();
		$_SESSION['username']=$data['username'];
		$_SESSION['nama']=$data['nama'];
		$_SESSION['level']=$data['level'];
		$_SESSION['sudahlogin']=true;
		
		header("Location: home.php");
	}
	else{
		header("Location: gagallogin.php");
	}
?>