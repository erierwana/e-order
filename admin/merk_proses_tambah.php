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
				<div class="box-top">Tambah Merk</div>
				<div class="box-panel">
					<?php
						$nama=$_POST['namamerk']; // Ambil data dari Form
						$link=koneksi_db();
						$sql="insert into merk values(null,'$nama','T')"; // susun SQL
						$res=mysqli_query($link,$sql); // Eksekusi SQL
						if($res){ // Jika berhasil
							$id_merk=mysqli_insert_id($link);
					?>
							<h4>Data Merk</h4><b><?=$nama;?></b> telah disimpan dengan id merk <b><?=$id_merk?></b>
					<?php
						}else { // Jika gagal
					?>
							<h4>Terjadi kesalahan dalam penyimpanan data merk baru. Silahkan diulang lagi</h4><br>
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