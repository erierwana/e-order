<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EORDER | 10113500</title>
    <link rel="SHORTCUT ICON" href="images/icon/custom.ico">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="member.css" rel="stylesheet">
  </head>
  <body>
    <div class="col-md-4 col-md-offset-4 form-login">
    
    <?php
    /* handle error */
    if (isset($_GET['error'])) : ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Warning!</strong> <?=base64_decode($_GET['error']);?>
        </div>
    <?php endif;?>

        <div class="outter-form-login">
        <div class="logo-login">
            <em class="glyphicon glyphicon-user"></em>
        </div>
            <h3 class="text-center title">Daftar Member</h3>
              <?php
                  include("include/lib_func.php");
                  $nama=$_POST['namamember'];//Ambil data dari Form 
                  $alamat=$_POST['alamat'];
                  $namauser=$_POST['id_user'];
                  $katasandi=$_POST['katasandi'];
                  $link=koneksi_db();
                  $sql="insert into member values('$namauser','$nama','$alamat',PASSWORD('$katasandi'),DEFAULT)"; // susun SQL
                  $res=mysqli_query($link,$sql); // Eksekusi SQL
                    if($res){
                    //Jika berhasil 
                    $namauser=mysqli_insert_id($link); 
              ?> 
                    <div class="info">Data Member <b><?php echo $nama; ?></b> telah disimpan dengan Username <b><?php echo $namauser; ?></b></div> 
              <?php
                    } 
                      else{
                  //Jika gagal
              ?> 
                    <div class="error">Terjadi kesalahan dalam penyimpanan data merk baru dengan kesalahan <?php echo mysqli_error($link);?>. Silahkan diulang lagi.<br></div>
              <?php
                    } 
              ?>
        </div>
        <a href="index.php"><b>LOGIN</b></a>        
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>