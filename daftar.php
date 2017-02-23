<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EORDER | 10113500</title>
    <link rel="SHORTCUT ICON" href="images/icon/custom.ico">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
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
            <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" 
                        action="proses-daftar.php">
            <h3 class="text-center title">Daftar Member</h3>
              <div class="form-group">
               <label class="control-label col-xs-3" for="Nama">Nama:</label>
                <div class="col-xs-9">
                <input type="text" class="form-control" id="Nama" name="namamember" placeholder="Nama Anda">
                </div>
              </div>
               <div class="form-group">
               <label class="control-label col-xs-3" for="alamat">Alamat:</label>
                <div class="col-xs-9">
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Anda">
                </div>
              </div>
              <div class="form-group">
               <label class="control-label col-xs-3" for="id">ID:</label>
                <div class="col-xs-9">
                <input type="text" class="form-control" id="id_user" name="id_user" placeholder="Id Member">
                </div>
              </div>
              <div class="form-group">
               <label class="control-label col-xs-3" for="katasandi">Kata Sandi:</label>
                <div class="col-xs-9">
                <input type="password" class="form-control" id="katasandi" name="katasandi" placeholder="********">
                </div>
              </div>
                <div class="form-group">
                  <div class="col-xs-offset-3 col-xs-9">
                   <input type="submit" class="btn btn-primary" value="Kirim">
                   <input type="reset" class="btn btn-default" value="Reset">
                </div>
            </div>
            </form>
        </div>
       <a href="index.php"><b>LOGIN</b></a>  
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>