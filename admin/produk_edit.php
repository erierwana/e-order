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
				<div class="box-top">Edit Produk</div>
				<div class="box-panel">
	<?php
		if(isset($_GET['id'])){
		$link=koneksi_db();
		$id_produk=$_GET['id'];
		$sql="SELECT * FROM produk WHERE id_produk='$id_produk'";
		$res=mysqli_query($link,$sql);
		if(mysqli_num_rows($res)==1){
		$data=mysqli_fetch_array($res);
    ?>
			<form method="post" enctype="multipart/form-data" action="produk_update_edit.php">
				<table align="center" bgcolor="white" border=0>
					<tr><td colspan=2 align=center class="judultable"><b>EDIT PRODUK</b></td></tr>
					<tr><td>ID Produk</td><td><input type=text name="id_produk" value="<?=$data['id_produk']?>" readonly></td></tr>
					<tr><td>Nama Produk</td><td><input type=text name="namaproduk" size=50 maxlength=100></td></tr>
					<tr><td>Kategori</td>
						<td><select name="id_kategori">
							<option value="">Pilih Kategori</option>
							<?php
								$res=mysqli_query($link,"SELECT id_kategori,nama FROM kategori
									WHERE dihapus='T'
									ORDER BY nama");
								while($data=mysqli_fetch_array($res)){
									echo "<option value=\"".$data['id_kategori']."\">".$data['nama']." </option>";
								}
							?>
							</select>
						</td>
					</tr>
					<tr><td>Merk</td>
						<td><select name="id_merk">
							<option value="">Pilih Merk</option>
							<?php
								$res=mysqli_query($link,"SELECT id_merk,nama FROM merk
									WHERE dihapus='T'
									ORDER BY nama");
								while($data=mysqli_fetch_array($res)){
									echo "<option value=\"".$data['id_merk']."\">".$data['nama']." </option>";
								}
							?>
							</select>
						</td>
					</tr>
					<tr><td>Harga</td><td><input type=text name="harga" size=16 maxlength=15></td></tr>
					<tr><td>Diskon</td><td><input type=text name="diskon" size=7 maxlength=6> %</td></tr>
					<tr><td>Stok</td><td><input type=text name="stok" size=7 maxlength=6></td></tr>
					<tr><td>Deskripsi</td><td><textarea name="deskripsi" cols="40" rows="5"></textarea></td></tr>
					<tr><td>File Gambar</td><td><input type=file name="filegambar"></td></tr>
					<tr><td></td><td><input type=submit value="Simpan"><input type=reset></td></tr>
				</table>
			</form>
   <?php
     }
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