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
					
			      		<form class="bs-example bs-example-form" role="form" />
			    	<div class="input-group">
			        	<span class="input-group-addon">Username</span>
			        	<input type="text" class="form-control" value="<?php echo $_SESSION['username'];?>" />
			       	</div>
			       		<br />
			       	<div class="input-group">
			        	<span class="input-group-addon">Nama User</span>
			        	<input type="text" class="form-control" value="<?php echo $_SESSION['nama'];?>" />
			       	</div>
			       		<br />
			       	<div class="input-group">
			        	<span class="input-group-addon">Level User</span>
			        	<input type="text" class="form-control" value="<?php echo $_SESSION['level'];?>" />
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