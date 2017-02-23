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
		<div class="logo"><a href="#">E-order<span>.10113500</span></a></div>
	</div>
	<a class="mobile" href="#">MENU</a>

	<div id="container">
		<div class="sidebar">
			<ul id="nav">
				<li><a class="head1" href="index.php"><h2>Menu Admin</h2></a></li>
				<li><a class="head" href="#"><h3>Data Merk</h3></a></li>
				<li><a href="merk_form_tambah.php">Tambah Merk</a></li>
				<li><a href="merk_form_edit.php">Edit</a></li>
				<li><a href="merk_form_hapus.php">Hapus</a></li>
				<li><a href="merk_view.php">View</a></li>
				<li><a href="merk_pencarian.php">Pencarian</a></li>
			</ul>
			<ul id="nav">
				<li><a class="head" href="#"><h3>Data Kategori</h3></a></li>
				<li><a href="kategori_tambah.php">Tambah</a></li>
				<li><a href="kategori_view.php">View</a></li>
			</ul>
			<ul id="nav">
				<li><a class="head" href="#"><h3>Data Produk</h3></a></li>
				<li><a href="produk_form_tambah.php">Tambah</a></li>
				<li><a class="selected" href="produk_view.php">View</a></li>
			</ul>
			<ul id="nav">
				<li><a class="head" href="../logout.php"><h4>Logout</h4></a></li>
			</ul>
		</div>
		<div class="content">
			<h1>Situs Administrator</h1>
			<p>Selamat Datang Admin</p>
			<div id="box">
				<div class="box-top">View Kategori</div>
				<div class="box-panel">
					<?php
						$id_kategori=$_POST['id_kategori'];
					    $nama=$_POST['nama'];
						$dihapus=$_POST['dihapus'];
						$link=koneksi_db();
						$sql="UPDATE kategori SET nama='$nama',dihapus='$dihapus' WHERE id_kategori='$id_kategori'";
						$res=mysqli_query($link,$sql);
						if($res){
							header("location:kategori_view.php");
							}else{
					?>
						   <div class="error">
						   Data kategori dengan ID <?=$id_kategori?> gagal diupdate,
						   dengan pesan kesalahan <b><?=mysqli_error()?></b>.
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