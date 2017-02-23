<?php
	session_start();
	if(isset($_SESSION['sudahlogin'])==false){
		header("location: form_login_admin.php");
	}else{
		header("location: home.php");
	}
?>