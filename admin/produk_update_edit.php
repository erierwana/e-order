<?php
session_start();
	if(($_SESSION['sudahlogin']==true)&&($_SESSION['username']!="")){
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
				<div class="box-top">View Kategori</div>
				<div class="box-panel">
					<?php
				if($_FILES['filegambar']['error']==0){
					$link=koneksi_db();
					$id_produk=$_POST['id_produk'];
					$nama=addslashes($_POST['namaproduk']);
					$id_merk=$_POST['id_merk'];
					$id_kategori=$_POST['id_kategori'];
					$harga=$_POST['harga'];
					$diskon=$_POST['diskon'];
					$stok=$_POST['stok'];
					$deskripsi=$_POST['deskripsi'];
					$filegambar=$_FILES['filegambar']['name'];
					$namafilebaru="../images/".$filegambar;
					if(move_uploaded_file($_FILES['filegambar']['tmp_name'],$namafilebaru)==true){
						 $sql="UPDATE produk SET id_kategori='$id_kategori',id_merk='$id_merk',nama='$nama',harga='$harga',diskon='$diskon',stok='$stok',deskripsi='$deskripsi',filegambar='$filegambar' WHERE id_produk=$id_produk";

						 /*VALUES(null,'$id_kategori','$id_merk','$nama','$harga',0,'$diskon','$stok','$deskripsi',
						 'Y','$filegambar','T')";*/
						//mysql

						//mysqli
						$res=mysqli_query($link,$sql);
						if($res){
							header("location: produk_view.php");
						}else{
							echo "Data produk baru gagal disimpan dengan kesalahan ".mysqli_error($link);
						}
					}
				}else
					echo "Penambahan produk gagal karena upload file gambar gagal";
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