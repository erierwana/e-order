<?php
session_start();
	if(($_SESSION['sudahlogin']==true)&&($_SESSION['username']!="")){
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Admin</title>
    <?php include("../include/lib_func.php");?>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/admin.css" rel="stylesheet">
</head>
<body>
	<div id="header">
		<div class="logo"><b><a href="#">E-order<span>10113500</span></a></b></div>
		<ul class="logout">
				<li><a class="head" href="logout.php"><h4>Logout</h4></a></li>
			</ul>
	</div>
	<div id="container">
		<div class="sidebar">
			<?php menu();?>
		</div>
		<div class="content">
			<h1>Situs Administrator</h1>
			<p>Selamat Datang Admin</p>
			<div id="box">
				<div class="box-top">Hapus Merk</div>
				<div class="box-panel">
					<?php
						$id_merk=$_POST['id_merk'];
						$link=koneksi_db();
						$sql="update merk set dihapus= 'Y' where id_merk='$id_merk'";
						$res=mysqli_query($link,$sql);
						if($res){
					?>
							<div class="info">Data Merk dengan ID <?=$id_merk?> telah dihapus.</div>
					<?php
						}else {
					?>
							<div class="error">
							Data merk dengan ID <?=$id_merk?> gagal dihapus,
							dengan pesan kesalahan <b><?=mysql_error()?></b>.
							</div>
					<?php
						}
					?>
   
				</div>
			</div>
		</div>
	</div>
<body>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
<?php
}else{
	header("location: belumlogin.php");
}
?>