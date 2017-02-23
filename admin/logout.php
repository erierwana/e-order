<?php
	session_start();
	unset($_SESSION['username'],$_SESSION['nama'],$_SESSION['level'],$_SESSION['sudahlogin']);
	header("Location: index.php");
?>