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
				<div class="box-top">Edit Kategori</div>
				<div class="box-panel">
	<?php
		if(isset($_GET['id'])){
		$link=koneksi_db();
		$id_kategori=$_GET['id'];
		$sql="SELECT * FROM kategori WHERE id_kategori='$id_kategori'";
		$res=mysqli_query($link,$sql);
		if(mysqli_num_rows($res)==1){
		$data=mysqli_fetch_array($res);
    ?>
        <form method=post action="kategori_update_edit.php">
        <table align="center" bgcolor="white" border=0>
        <tr><td colspan=2 align=center class="judultable"><b>EDIT KATEGORI</b></td></tr>
        <tr><td>ID Kategori</td>
        <td><input type=text name="id_kategori" value="<?=$data['id_kategori']?>" readonly></td></tr>
        <tr><td>Nama Kategori</td>
        <td><input type=text name="nama" value="<?=$data['nama']?>" size=31 maxlength=30></td></tr>
        <tr><td valign=top>Status Dihapus</td>
        <td><input type=radio name="dihapus" value="Y" <?php if($data['dihapus']=="Y") echo "checked";?>>
        Ya<br>
        <input type=radio name="dihapus" value="T" <?php if($data['dihapus']=="T") echo "checked";?>>
        Tidak
        </td>
        </tr>
        <tr><td></td>
        <td><input type=submit value="Update">
        <input type="button" onClick="javascript:history.back()" value="Batal"></td>
        </tr>
        </table>  
        </form>     
   <?php
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