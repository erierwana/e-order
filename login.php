<?php
	include("include/lib_func.php");
	$namauser=$_POST['namauser'];
	$katasandi=$_POST['katasandi'];
	$link=koneksi_db();
	$sql="select * from member where id_member='$namauser' and katasandi=password('$katasandi')";
	$res=mysqli_query($link,$sql);
	$sql2="update member set loginterakhir=now() where id_member='$namauser'";
	$res2=mysqli_query($link,$sql2);
	if(mysqli_num_rows($res)==1){ // jika username dan pass benar
		$data=mysqli_fetch_array($res);
		session_start();
		$_SESSION['namauser']=$data['id_member'];
		$_SESSION['namamember']=$data['nama'];
		$_SESSION['sudahloginmember']=true;
		if($res2){
			$_SESSION['loginterakhir']=$data['loginterakhir'];
		}
		header("Location: home.php");
	}
	else{
		header("Location: gagallogin.php");
	}
?>