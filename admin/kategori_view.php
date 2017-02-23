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
					<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
							Pencarian
							<select name="fieldcari">
								<option value="id_kategori" <?php if (isset($_POST['fieldcari'])=="id_kategori") echo "selected";?>>ID Kategori</option>
								<option value="nama" <?php if (isset($_POST['fieldcari'])=="nama") echo "selected";?>>Nama Kategori</option>
							</select>
							<input type="text" name="keyword" size=10 maxlength="30" value="<?=$_POST['keyword'];?>">
							<input type="submit" name="tblcari" value="Cari">
						</form>
					</div>
					<?php
						$link=koneksi_db();

						if(!empty ($_POST['fieldcari'])){
							$sql="SELECT * FROM kategori ";
							$fieldcari=$_POST['fieldcari'];
							$keyword=$_POST['keyword'];
							if($_POST['tblcari']=="Cari")// Jika tblcari diklik, tambahkan perintah WHERE ...
								$sql=$sql." WHERE $fieldcari LIKE '%$keyword%'";
							$sql.=" ORDER BY nama";
						}else
							$sql="SELECT * FROM kategori ORDER BY nama";

						$res=mysqli_query($link,$sql);
						$banyakrecord=mysqli_num_rows($res);

						if($banyakrecord>0){
					?>
						<div class="info">Data Kategori ditemukan sebanyak : <b><?=$banyakrecord?></b> Record</div>
						 <table border=0 align="center">
							<tr class="judultable"><td colspan=6>DAFTAR KATEGORI</td></tr>
							<tr class="judultable"><td>ID KATEGORI</td><td>NAMA</td><td>DIHAPUS</td><td>EDIT</td><td>HAPUS</td></tr>
					<?php
							$i=0;
							while($data=mysqli_fetch_array($res)){
							$i++;
					?>
							<tr class="<?php if($i%2==1) echo "isitabelganjil"; else echo "isitabelgenap";?>">
							 <td align="center">
							 	<?php echo $data['id_kategori'];?></td>
							 <td align="center"><?php echo $data['nama'];?></td>
							 <td align="center">
							 	<?php echo $data['dihapus'];?></td>
							 <td align="center">
                                <a href="kategori_edit.php?&id=<?php echo $data['id_kategori'];?>"onClick="return confirm('Apakah Anda yakin ingin mengedit data?')"><span class="glyphicon glyphicon-edit"></span></a></td>
                             <td align="center">
                                <a href="kategori_hapus.php?&id=<?php echo $data['id_kategori'];?>"onClick="return confirm('Apakah Anda yakin ingin menghapus data?')"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
							</tr>
					<?php
							}
					?>
					    </table>
					    <?php
						}else {
						?>
							<div class="warning">Data merk tidak ditemukan!.</div>
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