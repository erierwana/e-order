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
			      		<table width="100%" align="center" border=0 bordercolor="#FFFFFF">
				      	<tr>
							<td valign="top"><p class="judul">PENGEDITAN MERK</p>
						<?php
							$username=$_POST['username'];
							$userpass=$_POST['userpass'];
							$level=$_POST['level'];
							$link=koneksi_db();
							$sql="update admin set userpass=password('$userpass'),level='$level' where username='$username'";
							$res=mysqli_query($link,$sql);
							if($res){
							?>
								<div class="info">Data Admin dengan Username <?php echo $username;?> telah diupdate.</div>
								<?php
							}
							else {
							?>
								<div class="error">Data admin dengan Username <?php echo $username;?> gagal diupdate dengan pesan kesalahan <b>
								<?php echo mysqli_error($link);?></b>.</div>
							<?php
							}
						?> 	
							</td>
							</tr>
						</table>
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
	}
	else if(($_SESSION['sudahlogin']==true)&&($_SESSION['level']!="SUPERADMIN")){
		header("Location: bukansuperadmin.php");
	}
	else{
		header("Location: belumlogin.php");
	}
?>