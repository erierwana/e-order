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
				<div class="box-top">View Kategori</div>
				<div class="box-panel">
		<?php
			if (isset($_GET['id'])) {
				$link=koneksi_db();
				$id_kategori = $_GET['id'];
				$sql="SELECT * FROM kategori WHERE id_kategori ='$id_kategori'";
				$res=mysqli_query($link,$sql);
				$data=mysqli_fetch_array($res);
			} else {
				die ("Error. Tak ada Kode yang dipilih Silakan cek kembali! ");	
			}
			if (!empty($id_kategori) && $id_kategori != "") {
				$sql1 = "UPDATE kategori SET dihapus='Y' WHERE id_kategori='$id_kategori'";
				$res1 = mysqli_query ($link,$sql1);
				error_reporting(0);
			if ($res1==1) {	
				header("location:kategori_view.php");
				?>
				<?php
				
			} else {
				echo "ERROR"; mysqli_error();
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