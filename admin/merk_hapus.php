<?php
session_start();
/**
 * Jika Tidak login atau sudah login tapi bukan sebagai admin
 * maka akan dibawa kembali kehalaman login atau menuju halaman yang seharusnya.
 */
if ( !isset($_SESSION['user_login']) || 
    ( isset($_SESSION['user_login']) && $_SESSION['user_login'] != 'admin' ) ) {

	header('location: ../login.php');
	exit();
}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php 
		include("../include/lib_func.php"); 
	?>
 <title>E-order.10113500</title>
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/global.css" rel="stylesheet">
</head>
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
				<li><a class="selected" href="merk_form_edit.php">Edit</a></li>
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
				<li><a href="produk_view.php">View</a></li>
			</ul>
			<ul id="nav">
				<li><a class="head" href="../logout.php"><h4>Logout</h4></a></li>
			</ul>
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
						$sql="select * from merk where id_merk='$id_merk'";
						$res=mysqli_query($link,$sql);
						if(mysqli_num_rows($res)==1){
							$data=mysqli_fetch_array($res);
					?>
							<form method=post action="merk_proses_hapus.php">
								<input type=hidden name="id_merk" value="<?=$data['id_merk']?>">
								<table align="center" bgcolor="white" border=0>
									<tr><td colspan=2 align=center class="judultable"><b>HAPUS MERK</b></td></tr>
									<tr><td>ID Merk</td>
									<td><b><?=$data['id_merk']?></b></td></tr>
									<tr><td>Nama Merk</td><td><b><?=$data['nama']?></b></td></tr>
									<tr><td>Status Hapus</td><td><b><?=$data['dihapus']?></b></td></tr>
									<tr><td></td>
										<td>
											<input type=submit value="Hapus">
											<input type="button" onClick="javascript:history.back()" value="Batal">
										</td>
									</tr>
								</table>
							</form>
					<?php
					}
					else {
					?>
					<div class="warning">Data merk yang akan diedit tidak ditemukan!.</div>
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