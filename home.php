<?php
session_start();
	if(($_SESSION['sudahloginmember']==true)&&($_SESSION['namauser']!="")){
?>
<html>
<head>
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
				<div class="box-top">Data Member</div>
				<div class="box-panel">
				<table class="table">
							<tr><td><h3>Username : <?php echo $_SESSION['namauser']; ?></h3></td></tr>
							<tr><td><h3>Nama : <?php echo $_SESSION['namamember']; ?></h3></td></tr>
							<tr><td><h3>Level User : <?php echo $_SESSION['sudahloginmember']; ?></h3></td></tr>
						</table>
				</div>
			</div>
		</div>
	</div>
<body>
	
</body>
</html>
<?php
}else{
	header("location: gagallogin.php");
}
?>