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
			<table width="100%" align="center" border=0 >
					<td valign="top"><p class="judul">PENGEDITAN ADMIN</p>
					<?php
						$username=$_REQUEST['username'];
						$link=koneksi_db();
						$sql="select * from admin where username='$username'";
						$res=mysqli_query($link,$sql);
						if(mysqli_num_rows($res)==1){
							$data=mysqli_fetch_array($res);
						?>
						<form method=post action="admin_proses_update.php">
							<table align="center" bgcolor="white" border=0>
							<tr><td colspan=2 align=center class="judultable"><b>EDIT ADMIN</b></td></tr>
							<tr><td>Username</td><td><input type=text name="username" value="<?php echo $data['username'];?>" readonly></td></tr>
							<tr><td>Password</td><td><input type=text name="userpass" value="<?php echo $data['userpass'];?>" size=42 maxlength=41></td></tr>
							<tr><td>Level</td><td><input type=text name="level" value="<?php echo $data['level'];?>" size=42 maxlength=41></td></tr>
							<tr><td></td>
							    <td><input type=submit value="Update">
								<input type="button" onClick="javascript:history.back()" value="Batal"></td></tr>
							</table>
						</form>
						<?php
						}
						else {
						?><div class="warning">Data admin tidak ditemukan!.</div><?php
						}
						?>
						</td>
					</tr>
					</table>

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