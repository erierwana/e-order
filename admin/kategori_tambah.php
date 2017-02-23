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
				<div class="box-top">Tambah Kategori</div>
				<div class="box-panel">
					<!-- Awal form penambahan data kategori -->
					<?php
						$nama=$_POST['namamerk']; // Ambil data dari Form
						if(!empty($nama)){
							if($_POST['tblsimpan']='Simpan'){
								$link=koneksi_db();
								$sql="insert into kategori values(null,'$nama','T')"; // susun SQL
								$res=mysqli_query($link,$sql); // Eksekusi SQL
								if($res){ // Jika berhasil
									$id_kategori=mysqli_insert_id($link);
					?>
									<div class="info">Data Kategori <b><?=$nama;?></b> telah disimpan dengan id kategori <b><?=$id_kategori?></b></div>
					<?php
								}else { // Jika gagal
									$nama="";
					?>
									<div class="error">Terjadi kesalahan dalam penyimpanan data merk baru. Silahkan diulang lagi.<br></div>
					<?php
								}
					?>
								<form method=post action="<?=$_SERVER['PHP_SELF']?>">
									<table align="center" bgcolor="white" border=0>
										<tr><td colspan=2 align=center class="judultable"><b>TAMBAH KATEGORI BARU</b></td></tr>
										<tr><td>Nama Kategori</td><td><input type=text name="namamerk" value="" size=31 maxlength=30></td></tr>
										<tr><td></td><td><input type=submit name="tblsimpan" value="Simpan"><input type=reset></td></tr>
									</table>
								</form>
					<?php
							}
						}else{
					?>
								<form method=post action="<?=$_SERVER['PHP_SELF']?>">
									<table align="center" bgcolor="white" border=0>
										<tr><td colspan=2 align=center class="judultable"><b>TAMBAH KATEGORI BARU</b></td></tr>
										<tr><td>Nama Kategori</td><td><input type=text name="namamerk" value="" size=31 maxlength=30></td></tr>
										<tr><td></td><td><input type=submit name="tblsimpan" value="Simpan"><input type=reset></td></tr>
									</table>
								</form>
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