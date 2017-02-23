<?php
	session_start();
	if(($_SESSION['sudahloginmember']==true)&&($_SESSION['namauser']!="")){
?>
<html>
<head>
	<?php include("include/lib_func.php");?>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EORDER | 10113500</title>
    <link rel="SHORTCUT ICON" href="images/icon/custom.ico">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="member.css" rel="stylesheet">
</head>
	<div id="header">
		<div class="logo"><a href="#">E-order<span>.10113500</span></a></div>
	</div>
	<div id="container">
		<div class="sidebar">
			<ul id="nav">
				<li><a class="head" href="index.php">HOME</a></li>
				<li><a class="head" href="produk_view.php">PRODUK</a></li>
				<li><a class="head" href="logout.php">LOGOUT</a></li>
			</ul>
		</div>
		<div class="content">
			<h1>Situs Member</h1>
			<p>Selamat Datang Member</p>
			<div id="box">
				<div class="box-top">View Produk</div>
				<div class="box-panel">
				<?php
				$link=koneksi_db();
				$sql="SELECT p.id_produk,p.nama NamaProduk,p.dihapus,
				m.nama NamaMerk,k.nama NamaKategori,
				p.harga,p.diskon,p.stok,p.filegambar,p.dijual
				FROM produk p JOIN merk m ON p.id_merk=m.id_merk
				JOIN kategori k ON p.id_kategori=k.id_kategori
				ORDER BY p.nama";
				//mysql
				//mysqli
				$res=mysqli_query($link,$sql) or die(mysqli_error($link));
				$banyakrecord=mysqli_num_rows($res);
				if($banyakrecord>0){
			?>
			<div class="info">Data Produk ditemukan sebanyak: <b><?php echo $banyakrecord;?></b> Record</div>
			<table border=0 align="center">
				<tr class="judultable"><td colspan=11>DAFTAR PRODUK</td></tr>
				<tr class="judultable">
							<td>ID</td><td>GAMBAR</td>
							<td>NAMA</td><td>MERK</td>
							<td>KATEGORI</td><td>HARGA</td>
							<td>STOK</td><td>DISKON</td>
				</tr>
				<?php
					$i=0;
					//mysql
					//mysqli
					while($data=mysqli_fetch_array($res)){
						$i++;
				?>
				<tr class="<?php if($i%2==1) echo "isitabelganjil";else echo "isitabelgenap";?>">
				<td align="center"><?php echo $data['id_produk'];?></td>
					<td align="center">
						<img src="images/<?php echo $data['filegambar'];?>" width="70px" height="70px">
					</td>
					
					<td><?php echo $data['NamaProduk'];?></td>
					<td><?php echo $data['NamaMerk'];?></td>
					<td><?php echo $data['NamaKategori'];?></td>
					<td align="center">Rp. <?php echo number_format($data['harga'],0);?></td>
					<td align="center"><?php echo number_format($data['stok'],0);?></td>
					<td align="center"><?php echo number_format($data['diskon'],0);?>%</td>
				</tr>
				<?php
					}
				?>
			</table>
			<?php
				}else{
			?>
			<div class="warning">Data produk tidak ditemukan!.</div>
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
	header("location: index.php");
}
?>