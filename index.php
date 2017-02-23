<?php
	session_start();
	if(isset($_SESSION['sudahloginmember'])==false){
		header("location: form-login.php");
	}else{
		header("location: home.php");
	}
?>