<?php
	session_start();
	unset($_SESSION['namauser'],$_SESSION['namamember'],$_SESSION['sudahloginmember'],$_SESSION['loginterakhir']);
	header("Location: index.php");
?>