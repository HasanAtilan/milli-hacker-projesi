

<?php


session_start();
ob_start();
if(isset($_SESSION['yonetici']) ){
	header("Location: index.php");
	exit();
}

require 'baglantilar/database.php';


if(!empty(htmlspecialchars($_POST['kullaniciadi'])) && !empty(htmlspecialchars($_POST['sifre']))):
	
	$records = $conn->prepare('SELECT id,kullaniciadi,password FROM yoneticiler WHERE kullaniciadi = :kullaniciadi');
	$records->bindParam(':kullaniciadi', htmlspecialchars($_POST['kullaniciadi']));
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$message = '';

	if(count($results) > 0 && password_verify(htmlspecialchars($_POST['sifre']), $results['password']) ){

		$_SESSION['yonetici'] = $results['id'];
		header("Location: index.php?sayfa=anasayfa");

	} else {
		$message = '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>Hata:</strong> Kullanıcı adı veya şifre geçersiz.</div>';
	}

endif;

?>

  
<!DOCTYPE html>
<html lang="en">
<head>
<title>AimTerror - Giriş Yap</title>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="MR.NEPİX">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    
    <link href="../tasarim/bootstrap-select.css" rel="stylesheet">

    <link rel="stylesheet" href="../tasarim/bootstrap-flat.css" type="text/css">
    <link rel="stylesheet" href="../tasarim/font-awesome-animation.min.css">
    <link rel="stylesheet" href="../tasarim/main.css" type="text/css">

    <link href="../tasarim/style.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,700italic' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,500,600,700" rel="stylesheet" type="text/css">

    <link rel="icon" type="image/png" sizes="16x16" href="../tasarim/favicon.png">
    <meta name="theme-color" content="#ffffff">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
    <link href="../tasarim/blue.css" rel="stylesheet">
    <link href="../tasarim/bluex.css" rel="stylesheet">
    <script src="../tasarim/icheck.js"></script>

    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
    <script src='../tasarim/bootstrap-select.js'></script>
    <script src='../tasarim/Chart.js'></script>
    <script src='../tasarim/bootbox.js'></script>
    <script src="../tasarim/jquery.uploadifive.js"></script>
    <link rel="shortcut icon" href="">

</head>

<body style="background: #f6f7f8;">





<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="form-controller" style="margin-top:50px;">


       <div class="panel panel-default panel-signup">
      

        <div class="panel-heading" style="background-color: #1C242B;">
          <center><img src="https://resmim.net/f/Rc0ryp.png?nocache" style="height: 40px;">
        </div>
        <div class="panel-body">
		
       <form action="giris.php" method="POST">

          <div class="message">		
		  <?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>
		  </div>

          <div class="form-group">
            <label>Kullanici Adı</label>
            <input type="text" name="kullaniciadi" id="kullaniciadi" class="form-control" placeholder="Kullanici Adi" autocapitalize="off">
          </div>

          <div class="form-group">
            <label>Şifren</label>
            <input type="password" name="sifre" id="sifre" class="form-control" placeholder="Şifre" autocapitalize="off">
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-success btn-block">
              Giriş
            </button>
          </div>

        </div>

        </form>

    </div>
  </div>
</div>



</body>
</html> 
