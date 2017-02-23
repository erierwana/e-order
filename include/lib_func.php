<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	function menu_admin(){
	?>		
			<link rel="SHORTCUT ICON" href="../images/icon/admin.ico">
			<ul id="nav">
				<li><a class="head1" href="index.php"><h3>Menu Admin</h3></a></li>
				<li><a class="head" href="#"><b>Data Merk</b></a></li>
				<li><a href="merk_form_tambah.php">Tambah Merk</a></li>
				<li><a href="merk_form_edit.php">Edit</a></li>
				<li><a href="merk_form_hapus.php">Hapus</a></li>
				<li><a href="merk_view.php">View</a></li>
				<li><a href="merk_pencarian.php">Pencarian</a></li>
			</ul>
			<ul id="nav">
				<li><a class="head" href="#"><b>Data Kategori</b></a></li>
				<li><a href="kategori_tambah.php"><b>Tambah</b></a></li>
				<li><a href="kategori_view.php">View</a></li>
			</ul>
			<ul id="nav">
				<li><a class="head" href="#"><b>Data Produk</b></a></li>
				<li><a href="produk_form_tambah.php">Tambah</a></li>
				<li><a href="produk_view.php">View</a></li>
				<li><a href="upload.php">Upload</a></li>
			</ul>
			<ul id="nav">
				<li><a class="head" href="#"><b>Data Admin</b></a></li>
			<?php 
					if($_SESSION['level']=='SUPERADMIN'){
						echo "<li><a href='admin_form_tambah.php'>Tambah</a></li>";}
			?>
				<li><a href="admin_view.php">View</a></li>
			</ul>
			<ul id="nav">
				<li><a class="head" href="#"><b>Data Member</b></a></li>
				<li><a href="member_view.php">View</a></li>
			</ul>
			
	<?php
	}
	function menu(){
		if(isset($_SESSION['sudahlogin'])==false)
			header("location: form_login_admin.php");
		else
			menu_admin();
	}
	
	function koneksi_db(){
		$host = "localhost";
		$database = "dbeorder_10113500";
		$user = "root";
		$password = "";
		$link=mysqli_connect($host,$user,$password);
		mysqli_select_db($link,$database);
		if(!$link)
			echo "Error : ".mysqli_error($link);
		return $link;
	}
?>
