<?php
session_start();
	if(($_SESSION['sudahlogin']==true)&&($_SESSION['username']!="")){
?>
<html>
<head>
<title>E-order.10113500</title>
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
				<div class="box-top">Data Admin</div>
					<div class="box-panel">
						<table width="100%" align="center" border=0 >
						<tr>
						<td valign="top"><p class="judul">DATA MEMBER</p>
					    <?php
						$link=koneksi_db();
						$sql="select * from member order by id_member"; 
						$res=mysqli_query($link,$sql); 
						$banyakrecord=mysqli_num_rows($res); 
						if($banyakrecord>0){ 
						?> 
							<div class="info">Data Member ditemukan sebanyak: <b><?php echo $banyakrecord;?></b> Record</div>
							<table border=0 align="center">
							  <tr class="judultable"><td colspan=3>DAFTAR MEMBER</td></tr>
							  <tr class="judultable"><td>ID MEMBER</td><td>NAMA</td><td>LOGIN TERAKHIR</td></tr>
							  <?php
							  	$i=0;
							  	while($data=mysqli_fetch_array($res)){
							  		$i++; 
							  ?> 
							  	<tr class="<?php if($i%2==1) echo "isitabelganjil";else echo "isitabelgenap";?>">
							  	   <td align="center"><?php echo $data['id_member'];?></td>
							  	   <td><?php echo $data['nama'];?></td> 
							  	   <td align="center"><?php echo $data['loginterakhir'];?></td>
							  	</tr>
							  <?php
							  	} 
							  ?> 
							</table>
						<?php
						}
						else{ 
						?> 
						<div class="warning">Data admin tidak ditemukan!.</div>
						<?php
						} 
						?>
						</td>
						</tr>
			     	</div>
				</div>
			</div>
		</div>

			
	</div>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
<?php
}else{
	header("location: belumlogin.php");
}
?>