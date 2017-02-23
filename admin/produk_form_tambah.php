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
				<div class="box-top">Tambah Produk</div>
					<div class="box-panel">
					<div class="row">
  					<div class="col-md-9 col-md-9">
					<?php $link=koneksi_db(); ?>
						<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="produk_proses_tambah.php">
			    			<div class="form-group">
							  <label class="control-label col-sm-2" for="sel1">Nama Produk</label>
							  <div class="col-sm-5">
							  <input type="text" class="form-control" id="sel1" name="namaproduk">
							  </div>
							</div>
			    			<div class="form-group">
							  <label class="control-label col-sm-2" for="sel1">Kategori</label>
							  <div class="col-sm-5">
							  <select class="form-control" id="sel1" name="id_kategori">
							  <option value="">-pilih kategori-</option>
							    <?php
									$res=mysqli_query($link,"SELECT id_kategori,nama FROM kategori
										WHERE dihapus='T'
										ORDER BY nama");
										while($data=mysqli_fetch_array($res)){
										echo "<option value=\"".$data['id_kategori']."\">".$data['nama']." </option>";
									}
								?>
							  </select>
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-sm-2" for="sel1">Merk</label>
							  <div class="col-sm-5">
							  <select class="form-control" id="sel1" name="id_merk">
							  <option value="">-pilih merk-</option>
							    <?php
									$res=mysqli_query($link,"SELECT id_merk,nama FROM merk
									     WHERE dihapus='T'
									     ORDER BY nama");
									     while($data=mysqli_fetch_array($res)){
										echo "<option value=\"".$data['id_merk']."\">".$data['nama']." </option>";
									}
								?>
							  </select>
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-sm-2" for="sel1">Harga</label>
							  <div class="col-sm-5">
							  <input type="text" class="form-control" id="sel1" name="harga">
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-sm-2" for="sel1">Diskon</label>
							  <div class="col-sm-5">
							  <input type="text" class="form-control" id="sel1" name="diskon">
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-sm-2" for="sel1">Stok</label>
							  <div class="col-sm-5">
							  <input type="text" class="form-control" id="sel1" name="stok">
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-sm-2" for="sel1">Deskripsi</label>
							  <div class="col-sm-5">
							  <textarea class="form-control" id="sel1" name="deskripsi"></textarea>
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-sm-2" for="exampleInputFile">File Gambar</label>
							  <div class="col-sm-5">
							  <input type="file" class="form-control-file" id="exampleInputFile" name="filegambar">
							  </div>
							</div>
							  <div class="form-group">
							  <div class="col-sm-offset-2 col-sm-2">
			        		  <input type="submit" class="btn btn-default" value="Submit">	
			      			  </div>
			    			</div>
						</form>
					</div>
					</div>
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